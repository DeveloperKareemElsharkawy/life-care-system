<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Worker\WorkerFormRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Nationality;
use App\Models\User;
use App\Models\Worker;
use App\Models\WorkerExperience;
use App\Traits\HasCrudActions;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use ArPHP\I18N\Arabic;

class WorkersController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.workers';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.workers';


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['additional_skills'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $withLists = [
        'nationalities' => Country::class,
        'categories' => Category::class
    ];

    /**
     * The image fields
     *
     * @var array
     */
    protected $imageFields = ['face_image', 'worker_image'];


    /**
     * The image fields
     *
     * @var array
     */
    protected $manyToManyRelations = ['additional_skills'];


    protected function hasManyRelations($entity, $data)
    {
        WorkerExperience::query()->where('worker_id', $entity->id)->delete();

        foreach (array_filter($data['worker_experience']) as $WorkerExperience) {
            $entity->WorkerExperience()->create([
                'country_id' => $WorkerExperience['country_id'],
                'start_date' => $WorkerExperience['start_date'],
                'end_date' => $WorkerExperience['end_date'],
            ]);
        }

    }

    /**
     * The image fields
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
     * The image fields
     *
     * @var array
     */
    protected $filesFields = ['video_url'];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = WorkerFormRequest::class;

    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.workers.created',
        'updated' => 'admin/messages.workers.updated',
    ];


    /**
     * keys for Actions Messages translations
     *
     *
     * @return Response
     * @var array|string
     */
    public function downloadWorkerInfo($workerInfoId)
    {

        $worker = Worker::query()->findOrFail($workerInfoId);


//         return view('admin-panel.workers.pdf', compact('worker'));
        $reportHtml = view('admin-panel.workers.pdf', compact('worker'))->render();

        $arabic = new Arabic();
        $p = $arabic->arIdentify($reportHtml);

        for ($i = count($p) - 1; $i >= 0; $i -= 2) {
            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i - 1], $p[$i] - $p[$i - 1]));
            $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i - 1], $p[$i] - $p[$i - 1]);
        }
        $customPaper = array(0, 0, 400, 1100);

        $pdf = PDF::loadHTML($reportHtml);
        return $pdf->download('report.pdf');

    }

}
