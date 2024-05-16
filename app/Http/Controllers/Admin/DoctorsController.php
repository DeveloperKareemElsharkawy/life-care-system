<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DoctorEarningsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Doctors\DoctorsRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Http\Requests\Admin\College\CollegeRequest;
use App\Http\Requests\Admin\Pile\PileRequest;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\College;
use App\Models\Doctor;
use App\Models\DoctorProfitPercentage;
use App\Models\Page;
use App\Models\Pile;
use App\Models\SessionRecord;
use App\Models\User;
use App\Services\Admin\Images\UploadImageService;
use App\Traits\HasCrudActions;
use Carbon\Carbon;
use PhpParser\Comment\Doc;
use Maatwebsite\Excel\Facades\Excel;

class DoctorsController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.doctors';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.doctors';


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
    protected $validation = DoctorsRequest::class;

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
        'created' => 'تم إضافه طبيب بنجاح',
        'updated' => 'تم تعديل بيانات الطبيب بنجاح',
    ];

    public function create()
    {
        $categories = Category::query()->whereNull('parent_id')->get();
        return view('admin-panel.doctors.create', get_defined_vars());
    }

    public function store(DoctorsRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = $request->validated(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        $doctor = Doctor::query()->create($validated);

        $syncCategoriesData = [];
        if ($request->has('categories')) {
            $categories = array_values($validated['categories']);
            foreach ($categories as $category) {
                $syncCategoriesData[$category['id']] = ['profit_percentage' => $category['profit_percentage'], 'examination_profit_percentage' => $category['examination_profit_percentage']];
            }
        }

        $doctor->categories()->sync($syncCategoriesData);

        return to_route('admin.doctors.index')
            ->with('successful_message', trans('تم إضافه طبيب بنجاح'));

    }

    public function edit($doctorId)
    {
        $categories = Category::query()->whereNull('parent_id')->get();


        $doctor = Doctor::query()->with('doctorProfitPercentages')->find($doctorId);


        // Retrieve session records count grouped by month and year
        $monthYears = SessionRecord::query()
            ->selectRaw("DATE_FORMAT(attendances.date, '%Y-%m') as month, COUNT(*) as attendee_count")
            ->join('attendances', 'session_records.id', '=', 'attendances.session_record_id')
            ->where('session_records.doctor_id', $doctorId)
            ->groupBy('month')
            ->get();

// Initialize the session records array to store data for each month
        $sessionRecordsByMonth = [];

// Iterate through each month's data
        foreach ($monthYears as $monthYear) {


            // Extract year and month from the formatted date
            $monthYearObj = explode('-', $monthYear['month']);
            $year = $monthYearObj[0];
            $month = $monthYearObj[1];

            // Retrieve session records with attendees for the specified month and year
            $sessionRecords = SessionRecord::query()
                ->has('attendees')
                ->with('attendees', 'category', 'subCategory')
                ->where('doctor_id', $doctorId)
                ->withCount(['attendees' => function ($query) use ($month, $year) {
                    $query->whereMonth('date', $month)
                        ->whereYear('date', $year);
                }])
                ->whereHas('attendees', function ($query) use ($month, $year) {
                    $query->whereMonth('date', $month)
                        ->whereYear('date', $year);
                })
                ->get();

            // Initialize the attendees count for the current month
            $sessionRecordsByMonth[$monthYear['month']]['attendees_count'] = 0;
            $sessionRecordsByMonth[$monthYear['month']]['profit'] = 0;

            // If there are session records for the current month, update the attendees count
            if ($sessionRecords->isNotEmpty()) {
                foreach ($sessionRecords as $sessionRecord) {
                    $doctorProfitPercentage = DoctorProfitPercentage::query()
                        ->where('doctor_id', $doctorId)
                        ->where('category_id', $sessionRecord->main_category_id)
                        ->first();
                    $sessionRecordsByMonth[$monthYear['month']]['attendees_count'] += $sessionRecord->attendees_count;
                    $sessionRecordsByMonth[$monthYear['month']]['profit'] += (($sessionRecord->session_price * $doctorProfitPercentage->profit_percentage) / 100) * $sessionRecord->attendees_count;
                }
            }
        }

// Return the session records grouped by month

// Init

        return view('admin-panel.doctors.edit', get_defined_vars());
    }

    public function excel()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'doctors_earnings_' . $timestamp . '.xlsx';
        return Excel::download(new DoctorEarningsExport(request()->month, request()->doctorId), $filename);
    }

    public function update($doctorId, DoctorsRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = $request->validated(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        unset($validated['categories']);

        $doctor = Doctor::query()->where('id', $doctorId)->first();

        $doctor->update($validated);

        $syncCategoriesData = [];
        if ($request->has('categories')) {
            $categories = array_values($request['categories']);
            foreach ($categories as $category) {

                $syncCategoriesData[$category['id']] = ['profit_percentage' => $category['profit_percentage'], 'examination_profit_percentage' => $category['examination_profit_percentage']];
            }
        }


        $doctor->categories()->sync($syncCategoriesData);

        return to_route('admin.doctors.index')
            ->with('successful_message', trans('تم إضافه طبيب بنجاح'));

    }

}
