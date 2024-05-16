<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Category\CategoryResource;
use App\Http\Resources\API\Category\CategoryFilterResource;
use App\Http\Resources\API\Slider\SliderResource;
use App\Http\Resources\API\Worker\WorkerDetailsResource;
use App\Http\Resources\API\Worker\WorkerResource;
use App\Models\Category;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Slider;
use App\Models\Worker;
use Google\Service\Dataflow\WorkerDetails;
use Illuminate\Http\Request;

class WorkersController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api')->only(['toggleWorkerFavorite', 'myFavorites']);
    }

    public function getWorker(Request $request, $id)
    {
        $worker = Worker::query()->with('workerExperience')->find($id);
        if ($worker) {
            return $this->respondData(
                new WorkerDetailsResource($worker)
            );
        }
        return response()->json(['message' => 'Worker not found'], 404);
    }


    public function getWorkers(Request $request)
    {
        $workers = Worker::query()->paginate(10);
        return $this->respondWithPagination(WorkerResource::collection($workers));
    }

    public function searchWorkers(Request $request): \Illuminate\Http\JsonResponse
    {
        $workers = Worker::query()->WithFilters($request)->paginate(10);
        return $this->respondWithPagination(WorkerResource::collection($workers));
    }

    public function filterData(Request $request)
    {
        return $this->respondData([
            'categories' => CategoryFilterResource::collection(Category::query()->get()),
            'nationalities' => Nationality::query()->select('id', 'name')->get(),
            'religions' => Religion::query()->select('id', 'name')->get()


        ]);
    }

    public function toggleWorkerFavorite($workerId)
    {
        $worker = Worker::query()->find($workerId);
        $user = \Auth::user();
        if (!$worker) {
            return $this->respondError('Worker not found');
        }

        if ($user->hasFavorited($worker)) {
            $user->unfavorite($worker);
            return $this->respondMessage('تم الحذف من المفضلة');
        }

        $user->toggleFavorite($worker);
        return $this->respondMessage('تمت الاضافة الى المفضلة');
    }

    public function myFavorites()
    {
        $user = \Auth::user();

        $workers = $user->getFavoriteItems(Worker::class)->paginate(10);

        return $this->respondWithPagination(WorkerResource::collection($workers));
    }
}
