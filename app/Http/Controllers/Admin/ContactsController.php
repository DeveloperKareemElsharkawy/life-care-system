<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Contact\ReplyFormRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Reply;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class ContactsController extends Controller
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
    protected $viewPath = 'admin-panel.contacts';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.contacts';


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
    protected $validation = PageRequest::class;

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
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.pages.created',
        'updated' => 'admin/messages.pages.updated',
    ];

    public function reply($contactID, ReplyFormRequest $request)
    {
        $data = $request->validated();

        $this->ajaxValidationCheck(request()); // Check Ajax Request

        $contact = Contact::query()->find($request['contact_id']);

        $contact->update([
            'is_read' => $request['status'],
        ]);


        $data['admin_id'] = \Auth::user()->id;

        if ($data['message']) {
            $reply = Reply::query()->create($data);

//        $this->sendReplyNotification($contact, $reply);
        }

        return redirect()->route('admin.contacts.index')->with('successful_message', trans('admin/messages.contacts.reply_created'));

    }


    public function sendReplyNotification($content, $subject, $email)
    {
        \Mail::send([], [], function (Message $message) use ($content, $subject, $email) {
            $message->to($email)
                ->subject($subject)
                ->setBody($content, 'text/html');
        });
    }

}
