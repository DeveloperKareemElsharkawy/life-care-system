<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Http\Requests\Admin\College\CollegeRequest;
use App\Http\Requests\Admin\Pile\PileNotificationsRequest;
use App\Http\Requests\Admin\Pile\PileRequest;
use App\Models\Category;
use App\Models\College;
use App\Models\Page;
use App\Models\Pile;
use App\Models\PileNotification;
use App\Traits\HasCrudActions;

class PileNotificationsController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = PileNotification::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.pile-notifications';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.pile-notifications';


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
     * The relations to eager load on every query.
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
    protected $imageFields = [];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = PileNotificationsRequest::class;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $multiImagesFields = [];


    protected $routeParams = [];


    protected function hasManyRelations($entity, $data)
    {

    }

    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.colleges.created',
        'updated' => 'admin/messages.colleges.updated',
    ];


    public function create()
    {
        $piles = Pile::query()->get();

        return view('admin-panel.pile-notifications.create',compact('piles'));
    }
}
