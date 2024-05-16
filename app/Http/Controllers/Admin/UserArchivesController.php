<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserArchiveFormRequest;
use App\Http\Requests\Admin\Worker\WorkerArchiveRequest;
use App\Models\User;
use App\Models\UserArchive;
use App\Models\Worker;
use App\Models\WorkerArchives;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class UserArchivesController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = UserArchive::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.users-archives';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.users_archives';

    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routeParams = [
        'user_id',
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

    protected function hasManyRelations($entity, $data)
    {

    }

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
    protected $filesFields = ['file'];
    /**
     * The image fields
     *
     * @var array
     */
    protected $manyToManyRelations = [

    ];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = UserArchiveFormRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.users_archives.created',
        'updated' => 'admin/messages.users_archives.updated',
    ];

    public function show(int $id)
    {
        $user = User::query()->findOrFail($id);

        return view("{$this->viewPath}.show", compact('user'));
    }

    public function create()
    {
        return view("{$this->viewPath}.create")->with([
            'user' => User::query()->findOrFail(request()->route('user_id')),
        ]);
    }

    public function edit()
    {
        return view("{$this->viewPath}.edit")->with([
            'user' => User::query()->findOrFail(request()->route('user_id')),
            'user_archive' => UserArchive::query()->findOrFail(request()->route('user_archive_id')),
        ]);
    }

}
