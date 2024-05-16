<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\CountryRequest;
use App\Http\Requests\Admin\Nationality\NationalityRequest;
use App\Models\Country;
use App\Models\Nationality;
use App\Models\NationalityProcessStep;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.countries';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.countries';


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
    protected $manyToManyRelations = [];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = CountryRequest::class;

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
        'created' => 'admin/messages.countries.created',
        'updated' => 'admin/messages.countries.updated',
    ];

}
