<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Category\SubCategoryFormRequest;
use App\Http\Requests\Admin\PaymentMethods\PaymentMethodsFormRequest;
use App\Http\Requests\Admin\Session\SessionsFormRequest;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyCategory;
use App\Models\PaymentMethod;
use App\Models\Session;
use App\Models\SessionRecord;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\HasCrudActions;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    use HasCrudActions;


    protected $model = Session::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.sessions';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $multiImagesFields = [];
    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $routeParams = [];

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
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.sessions';


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
     * The image fields
     *
     * @var array
     */
    protected $translatableFields = [
    ];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = SessionsFormRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.categories.created',
        'updated' => 'admin/messages.categories.updated',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $doctors = Doctor::query()->get();

        return view("{$this->viewPath}.index", ['doctors' => $doctors]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function pendingSessions()
    {
        return view("{$this->viewPath}.pending");
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function activeSessions()
    {
        return view("{$this->viewPath}.active");
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function missedSessions()
    {
        return view("{$this->viewPath}.missed");
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function finishedSessions()
    {
        return view("{$this->viewPath}.finished");
    }

    public function create()
    {
        $categories = Category::query()->whereNull('parent_id')->get();
        $users = User::query()->get();
        $doctors = Doctor::query()->get();
        $insuranceCompanies = InsuranceCompany::query()->get();

        return view('admin-panel.sessions.create', compact('categories', 'users', 'insuranceCompanies', 'doctors'));
    }


    public function edit($sessionId)
    {
        $categories = Category::query()->whereNull('parent_id')->get();
        $subCategories = Category::query()->whereNull('parent_id')->get();
        $users = User::query()->get();
        $doctors = Doctor::query()->get();
        $insuranceCompanies = InsuranceCompany::query()->get();
        $session = Session::query()->with('records')->find($sessionId);

        $user = User::query()->with('state')->find($session->user_id);

        $doctor = Doctor::query()->find($session->doctor_id);

        $referral_doctor = Doctor::query()->find($user->referral_doctor_id);

        $company = InsuranceCompany::query()->find($session->user->insurance_company_id);

        return view('admin-panel.sessions.edit',
            compact('categories', 'users', 'insuranceCompanies', 'doctors', 'session', 'user', 'doctor', 'referral_doctor', 'company'));
    }


    /**
     * @param $sessionId
     * @return Application|Factory|View
     */
    public function show($sessionId)
    {
        $session = Session::query()->with('records', 'attendances')->find($sessionId);

        $categories = Category::query()->whereNull('parent_id')->get();

        $users = User::query()->get();
        $doctors = Doctor::query()->get();

        $insuranceCompanies = InsuranceCompany::query()->get();

        $user = User::query()->with('state')->find($session->user_id);

        $doctor = Doctor::query()->find($session->doctor_id);

        $referral_doctor = Doctor::query()->find($user->referral_doctor_id);

        $company = InsuranceCompany::query()->find($session->user->insurance_company_id);

        $currentSessions = [];
        foreach ($session->records as $record) {
            $currentSessions[$record->id] = $record->category->name . ' / ' . $record->subCategory->name;
        }

        // Instantiate the SessionService
        $sessionService = new \App\Services\Admin\Session\SessionService();

        // Call the getSessionData method from the SessionService
        $sessionPayments = $sessionService->getSessionData($sessionId);

        return view('admin-panel.sessions.show',
            compact('categories', 'users', 'insuranceCompanies', 'doctors', 'session', 'user', 'doctor', 'referral_doctor', 'company', 'currentSessions', 'sessionPayments'));
    }


    public function getDoctorProfitPercentage()
    {
        $doctor = Doctor::query()->find(request()->doctor_id);
        if ($doctor)
            return response()->json(['data' => $doctor->profit_percentage]);
    }


    public function saveTransaction($sessionId, Request $request)
    {
        $admin = $request->user();

        Transaction::create([
            'session_id' => $sessionId,
            'payment' => $request->payment,
            'transaction_from' => $request->transaction_from,
            'receipt_number' => $request->receipt_number,
            'date' => $request->date,
            'type' => $request->input('type','Deposit'),
            'notes' => $request->notes,
            'admin_id' => $admin->id,
            'transaction_type' => $request->transaction_type,
            'session_record_id' => $request->session_record_id,
        ]);

        return redirect()->back();
    }

    public function saveStatus($sessionId, Request $request)
    {
        Session::query()->where('id', $sessionId)->update([
            'status' => $request->status,
            'notes' => $request->notes,
            'remaining_amount_for_client' => $request->remaining_amount_for_client,
        ]);

        return redirect()->back();
    }

    public function fastSaveTransaction($sessionId, Request $request)
    {
        $admin = $request->user();

        Transaction::create([
            'session_id' => $sessionId,
            'payment' => $request->payment,
            'transaction_from' => $request->transaction_from,
            'receipt_number' => $request->receipt_number,
            'date' => $request->date,
            'type' => $request->input('type','Deposit'),
            'notes' => $request->notes,
            'admin_id' => $admin->id,
            'transaction_type' => $request->transaction_type,
            'session_record_id' => $request->session_record_id,
        ]);

        return response()->json([
            'status' => true,
            'session_id' => $sessionId,
        ]);
    }

    public function saveAttendance($sessionId, Request $request)
    {
        $sessionRecord = SessionRecord::query()->find($request->session_record_id);

        $admin = $request->user();

        Attendance::create([
            'session_id' => $sessionId,
            'session_record_id' => $sessionRecord->id,
            'category_id' => $sessionRecord->category_id,
            'main_category_id' => $sessionRecord->main_category_id,
            'date' => $request->date,
            'status' => $request->status,
            'notes' => $request->notes,
            'admin_id' => $admin->id,
        ]);


        $sessionRecordsCount = Attendance::query()->where('session_id', $sessionId)->where('status', 'Attended')->where('session_record_id', $sessionRecord->id)->count();

        if ($sessionRecord->sessions_count < $sessionRecordsCount) {
            $sessionRecord->sessions_count = $sessionRecordsCount;
            $sessionRecord->save();
        }

        return redirect()->back();
    }

    public function fastSaveAttendance($sessionId, Request $request)
    {
        // Instantiate the SessionService
        $sessionService = new \App\Services\Admin\Session\SessionService();

        // Call the getSessionData method from the SessionService
        $sessionData = $sessionService->getSessionData($sessionId);


        $sessionRecord = SessionRecord::query()->find($request->session_record_id);

        if ($sessionRecord->sessions_debt_for_client > $sessionData['remaining_for_client'] && !$request->input('force')) {
            return response()->json([
                'status' => false,
                'message' => 'إن سعر الجلسة أقل من الرصيد المتاح للعميل هل أنت متأكد ؟',
            ]);
        }

        $attendanceCount = Attendance::query()->where('session_record_id', $request->session_record_id)->count();

        if ($attendanceCount >= $sessionRecord->sessions_count && !$request->input('force')) {
            return response()->json([
                'status' => false,
                'message' => 'لقد تم حضور جميع الجلسات المتفق عليها بالفعل هل أنت متأكد',
            ]);
        }

        $admin = $request->user();

        Attendance::create([
            'session_id' => $sessionId,
            'session_record_id' => $sessionRecord->id,
            'category_id' => $sessionRecord->category_id,
            'main_category_id' => $sessionRecord->main_category_id,
            'date' => $request->date,
            'status' => $request->status,
            'notes' => $request->notes,
            'admin_id' => $admin->id,

        ]);

        $sessionRecordsCount = Attendance::query()->where('session_id', $sessionId)->where('status', 'Attended')->where('session_record_id', $sessionRecord->id)->count();

        if ($sessionRecord->sessions_count < $sessionRecordsCount) {
            $sessionRecord->sessions_count = $sessionRecordsCount;
            $sessionRecord->save();
        }

        return response()->json([
            'status' => true,
            'session_id' => $sessionId,
        ]);
    }

    public function getUser()
    {
        $user = User::query()->with('state')->find(request()->user_id);

        $categories = Category::query()->whereNull('parent_id')->get();

        $doctors = Doctor::query()->get();

        $view = $user->contract_type == 'contract' ? view('admin-panel.sessions.partials.contract-session', ['categories' => $categories, 'doctors' => $doctors]) : view('admin-panel.sessions.partials.cash-session', ['categories' => $categories, 'doctors' => $doctors]);
        $viewContent = $view->render();

        $doctor = Doctor::query()->find($user->doctor_id);

        $referralDoctor = Doctor::query()->find($user->referral_doctor_id);

        $company = InsuranceCompany::query()->find($user->insurance_company_id);

        if ($user)
            return response()->json(['data' => $user,
                'html' => $viewContent,
                'doctor_name' => $doctor?->name,
                'referral_doctor_name' => $referralDoctor?->name,
                'company_name' => $company?->name,
            ]);
    }

    public function getCategoryPrice()
    {
        $user = User::query()->find(request()->user_id);
        $insuranceCompanyCategory = InsuranceCompanyCategory::query()->where('category_id', request()->category_id)
            ->where('insurance_company_id', $user->insurance_company_id)
            ->first();

        $category = Category::query()->find(request()->category_id);


        if ($insuranceCompanyCategory) {
            $difference = $category->price - $insuranceCompanyCategory->discount_price_value;

            $percentage = ($difference / $category->price) * 100;
            return response()->json(['data' => $insuranceCompanyCategory, 'category_price' => $category->price, 'percentage' => $percentage]);
        }

        if ($category)
            return response()->json(['data' => $category]);

    }

    public function store(SessionsFormRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request


        $session = Session::create($request->validated());

        foreach ($request->sessions as $sessionData) {
            $session->records()->create($sessionData);
        }

        return to_route('admin.sessions.index')->with('successful_message', 'تم إضافه الجلسات');

    }

    public function update(SessionsFormRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request


        $session = Session::query()->where('id', $request->session_id)->first();
        $session->update($request->safe()->except('sessions'));

        $session->records()->delete();

        foreach ($request->sessions as $sessionData) {
            $session->records()->create($sessionData);
        }

        return to_route('admin.sessions.index')->with('successful_message', 'تم تعديل الجلسات');

    }
}
