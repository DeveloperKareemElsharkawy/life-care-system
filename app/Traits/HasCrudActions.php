<?php

namespace App\Traits;

use App\Models\TemporaryFile;
use App\Models\Worker;
use App\Services\Admin\Images\MultiImageUploadService;
use App\Services\Admin\Files\UploadFileService;
use App\Services\Admin\Images\UploadImageService;
use App\Services\Admin\Logs\LogDataFormatter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

trait HasCrudActions
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view("{$this->viewPath}.index");
    }



    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $entity = $this->getEntity($id);

        $relationsList = [];

        foreach ($this->withLists as $relation => $model) {
            $relationsList[$relation] = $model::all();
        }

        $relationsList[$this->getResourceName()] = $entity;

        return view("{$this->viewPath}.show")->with($relationsList);
    }


    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        $relationsList = [];

        foreach ($this->withLists as $relation => $model) {
            $relationsList[$relation] = $model::all();
        }

        return view("{$this->viewPath}.create", $relationsList);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */

    public function edit(int $id)
    {
        $entity = $this->getModel()->find($id);

        $relationsList = [];

        foreach ($this->withLists as $relation => $model) {
            $relationsList[$relation] = $model::all();
        }

        $relationsList[$this->getResourceName()] = $entity;

        return view("{$this->viewPath}.edit")->with($relationsList);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(UploadImageService $uploadImageService, MultiImageUploadService $multiImageUploadService, UploadFileService $fileService)
    {
        $data = $this->getRequest()->all();

        $this->ajaxValidationCheck(request()); // Check Ajax Request


        if (isset($this->filesFields)) {
            foreach ($this->filesFields as $filesField) {
                if (key_exists($filesField, $data))
                    $data[$filesField] = $fileService->execute($this->getResourceName(), $data[$filesField]);
            }
        }

        foreach ($this->multiImagesFields as $imagesField) {
            if (key_exists($imagesField, $data))
                $data[$imagesField] = $multiImageUploadService->execute($this->getResourceName(), $data[$imagesField]);
        }


        foreach ($this->imageFields as $image) {
            if (key_exists($image, $data))
                $data[$image] = $uploadImageService->execute($this->getResourceName(), $data[$image]);
        }


        $model = $this->getModel()->create($data);

        foreach ($this->manyToManyRelations as $relation) {
            if (key_exists($relation, $data))
                $model->$relation()->sync($data[$relation]);
        }

        if (isset($this->translatableFields)) {
            foreach ($this->translatableFields as $field) {
                foreach ($data[$field] as $lang => $value) {
                    $model->update([
                        $field => $data[$field]
                    ]);
                }
            }
        }


        $this->hasManyRelations($model, $data);

        return redirect()->route("{$this->getRoutePrefix()}.index", $this->RouteParams($model))
            ->with('successful_message', $this->getSuccessfulMessage('created'));

    }

    public function RouteParams($model): array
    {
        $params = [];
        foreach ($this->routeParams as $routeParam) {
            $params[$routeParam] = $model[$routeParam];
        }
        return $params;
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update(UploadImageService $uploadImageService, LogDataFormatter $dataFormatter, MultiImageUploadService $multiImageUploadService, UploadFileService $fileService)
    {
        $data = $this->getRequest()->validated();

        $this->ajaxValidationCheck(request()); // Check Ajax Request

        if (isset($this->filesFields)) {
            foreach ($this->filesFields as $filesField) {
                if (key_exists($filesField, $data))
                    $data[$filesField] = $fileService->execute($this->getResourceName(), $data[$filesField]);
            }
        }


        foreach ($this->multiImagesFields as $imagesField) {
            if (key_exists($imagesField, $data))
                $data[$imagesField] = $multiImageUploadService->execute($this->getResourceName(), $data[$imagesField]);
        }

        foreach ($this->imageFields as $image) {
            if (key_exists($image, $data))
                $data[$image] = $uploadImageService->execute('users', $data[$image]);

        }

        $model = $this->getEntity($data[$this->getResourceName() . '_id']);
        $model->update($data);

        if (isset($this->translatableFields)) {
            foreach ($this->translatableFields as $field) {
                foreach ($data[$field] as $lang => $value) {
                    $model->$field = $data[$field];
                    $model->save();
                }
            }
        }

        foreach ($this->manyToManyRelations as $relation) {
            if (key_exists($relation, $data))
                $model->$relation()->sync($data[$relation]);
        }

        ActivityLogger::activity(trans('admin/datatable.buttons.u_log_data', ['name' => $this->getResourceName()]),
            $dataFormatter->format($model, $data));

        $this->hasManyRelations($model, $data);

        return redirect()->route("{$this->getRoutePrefix()}.index", $this->RouteParams($model))
            ->with('successful_message', $this->getSuccessfulMessage('updated'));
    }


    /**
     * Get a new instance of the model.
     *
     * @return \Modules\Support\Eloquent\Model
     */
    protected
    function getModel()
    {
        return new $this->model;
    }


    /**
     * Get an entity by the given id.
     *
     * @param int $id
     * @return Model
     */
    protected
    function getEntity(int $id): Model
    {
        return $this->getModel()
            ->with($this->relations())
            ->withoutGlobalScope('active')
            ->findOrFail($id);
    }


    /**
     * Get the relations that should be eager loaded.
     *
     * @return array
     */
    private
    function relations(): array
    {
        return collect($this->with ?? [])->mapWithKeys(function ($relation) {
            return [$relation => function ($query) {
                return $query->withoutGlobalScope('active');
            }];
        })->all();
    }


    /**
     * Get request object
     *
     * @param string $action
     * @return Request
     */
    protected
    function getRequest()
    {
        if (!isset($this->validation)) {
            return request();
        }

        return resolve($this->validation);
    }


    /**
     * Get route prefix of the resource.
     *
     * @return string
     */
    protected
    function getRoutePrefix(): string
    {
        if (isset($this->routePrefix)) {
            return $this->routePrefix;
        }

        return "admin.{$this->getModel()->getTable()}";
    }

    /**
     * Get label of the resource.
     *
     * @return void
     */
    protected
    function getLabel()
    {
        return trans($this->label);
    }


    /**
     * Get name of the resource.
     *
     * @return string
     */
    protected
    function getResourceName(): string
    {
        if (isset($this->resourceName)) {
            return $this->resourceName;
        }

        return lcfirst(class_basename($this->model));
    }

    /**
     * Get name of the resource.
     *
     * @param $action
     * @return string
     */
    public
    function getSuccessfulMessage($action): string
    {
        return trans($this->getSuccessfulMessage[$action]);
    }
}
