<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Worker\WorkerArchiveRequest;
use App\Models\Worker;
use App\Models\WorkerArchives;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class WorkersArchivesController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = WorkerArchives::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.workers-archives';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.workers_archives';

    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routeParams = [
        'worker_id',
    ];



    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $withLists = [

    ];

    /**
     * The image fields
     *
     * @var array
     */
    protected $imageFields = [];

    /**
     * The image fields
     *
     * @var array
     */
    protected $multiImagesFields = ['images'];

    /**
     * The image fields
     *
     * @var array
     */
    protected $manyToManyRelations = [

    ];

    /**
     * The image fields
     *
     * @var array
     */
    protected $filesFields = ['file'];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = WorkerArchiveRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.workers_archives.created',
        'updated' => 'admin/messages.workers_archives.updated',
    ];

    public function show(int $id)
    {
        $worker = Worker::query()->findOrFail($id);

        return view("{$this->viewPath}.show", compact('worker'));
    }

    public function create()
    {
        return view("{$this->viewPath}.create")->with([
            'worker' => Worker::query()->findOrFail(request()->route('worker_id')),
        ]);
    }

    public function edit()
    {
        return view("{$this->viewPath}.edit")->with([
            'worker' => Worker::query()->findOrFail(request()->route('worker_id')),
            'worker_archive' => WorkerArchives::query()->findOrFail(request()->route('worker_archive_id')),
        ]);
    }

}
