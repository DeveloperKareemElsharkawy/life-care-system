<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NationalityProcessStep\NationalityProcessStepRequest;
use App\Models\NationalityProcessStep;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class NationalityProcessStepController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = NationalityProcessStep::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.nationality-process-steps';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.nationality_process_steps';



    /**
     * View path of the resource.
     *
     *
     * @param $entity
     * @param $data
     */
    protected function hasManyRelations($entity, $data)
    {

    }


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
    protected $multiImagesFields = [];


    /**
     * The image fields
     *
     * @var array
     */
    protected $manyToManyRelations = [];

    /**
     * The image fields
     *
     * @var array
     */
    protected $translatableFields = [
        'title'
    ];


    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = NationalityProcessStepRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.nationality_process_steps.created',
        'updated' => 'admin/messages.nationality_process_steps.updated',
    ];

}
