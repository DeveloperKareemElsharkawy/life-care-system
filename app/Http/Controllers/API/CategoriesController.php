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

class CategoriesController extends BaseController
{

    public function getCategories(Request $request)
    {
        $categories = Category::query()->paginate(10);
        return $this->respondWithPagination(CategoryResource::collection($categories));
    }

    public function categoryWorkers($categoryId)
    {
        $workers = Worker::query()->where('category_id', $categoryId)->paginate(10);
        return $this->respondWithPagination(WorkerResource::collection($workers));
    }

}
