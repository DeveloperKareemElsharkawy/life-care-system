<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Contact\ContactFormRequest;
use App\Http\Requests\Admin\Contact\ReplyFormRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Reply;
use App\Models\User;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class ContactListController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.contacts-list';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.contacts-list';


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
    protected $validation = ContactFormRequest::class;

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
        'created' => 'admin/messages.pages.created',
        'updated' => 'admin/messages.pages.updated',
    ];


    public function index($userId)
    {
        $user = User::where(['id' => $userId])->first();

        return view('admin-panel.contacts-list.index', compact('user'));
    }

    public function create($userId)
    {
        $user = User::where(['id' => $userId])->first();

        return view('admin-panel.contacts-list.create', compact('user'));
    }

    public function edit($userId,$contactListId)
    {
        $user = User::query()->find($userId);

        $contactList = Contact::query()->find($contactListId);

        return view('admin-panel.contacts-list.edit', compact('user','contactList'));
    }

    public function store($userId,ContactFormRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $user = User::query()->find($userId);

        Contact::query()->create($request->validated());
        return redirect()->route('admin.contacts-list.index', ['user_id' => $user->id]);
    }

    public function update($userId,$contactListId,ContactFormRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $user = User::query()->find($userId);

        return redirect()->route('admin.contacts-list.index', ['user_id' => $user->id]);
    }

}
