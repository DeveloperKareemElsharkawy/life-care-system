<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Nationality\NationalityRequest;
use App\Models\Nationality;
use App\Models\NationalityProcessStep;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class NationalitiesController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Nationality::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.nationalities';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.nationalities';


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
    protected $multiImagesFields = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $routeParams = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $withLists = [
        'processSteps' => NationalityProcessStep::class,
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
    protected $manyToManyRelations = ['processSteps'];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = NationalityRequest::class;

    /**
     * The image fields
     *
     * @var array
     */
    protected $translatableFields = [
        'name'
    ];

    protected function hasManyRelations($entity, $data)
    {

    }

    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.nationalities.created',
        'updated' => 'admin/messages.nationalities.updated',
    ];

}
