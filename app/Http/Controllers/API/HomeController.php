<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Category\CategoryResource;
use App\Http\Resources\API\Slider\SliderResource;
use App\Http\Resources\API\Worker\WorkerResource;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Worker;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->respondData([
            'slider' => SliderResource::collection(Slider::query()->get()),
            'categories' => CategoryResource::collection(Category::query()->limit(4)->get()),
            'latest_workers' => WorkerResource::collection(Worker::query()->limit(4)->get()),
            'categories_count' => Category::query()->count(),
            'workers_count' => Worker::query()->count(),
        ]);
    }

    public function topWorkers(Request $request)
    {

        return $this->respondData([
            WorkerResource::collection(Worker::query()->limit(4)->get()),
        ]);
    }

    public function newWorkers(Request $request)
    {
        return $this->respondData(
            WorkerResource::collection(Worker::query()->limit(4)->latest()->get()),
        );
    }
}
