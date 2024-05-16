<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Contact\ReplyFormRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Http\Requests\Admin\Slider\SliderFormRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Reply;
use App\Models\Slider;
use App\Models\Worker;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.slider';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.slider';


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [


    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $withLists = [
        'categories' => Category::class,
        'workers' => Worker::class,
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
    protected $imageFields = ['image'];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = SliderFormRequest::class;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $multiImagesFields = ['images'];


    protected $routeParams = [];


    protected function hasManyRelations($entity, $data)
    {

    }

    /**
     * The image fields
     *
     * @var array
     */
    protected $translatableFields = [
        'title',
        'description',
    ];


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.pages.created',
        'updated' => 'admin/messages.pages.updated',
    ];

}
