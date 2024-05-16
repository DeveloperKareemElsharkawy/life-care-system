<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\MakeOrderRequest;
use App\Http\Requests\API\User\UpdatePasswordRequest;
use App\Http\Requests\API\User\UpdateProfileRequest;
use App\Http\Resources\API\Order\OrdersIndexResource;
use App\Http\Resources\API\Order\OrdersResource;
use App\Http\Resources\API\User\UserResource;
use App\Models\Order;
use App\Models\OrderProcess;
use App\Models\User;
use App\Models\Worker;
use App\Notifications\OrderStatusNotification;
use App\Services\Admin\Images\UploadImageService;
use App\Services\Admin\Order\SaveOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class OrdersController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function makeOrder(MakeOrderRequest $request, SaveOrderService $saveOrderService)
    {
        $order = $saveOrderService->save($request->validated());

        $user = auth()->user();

         $data = [
            'badge' => '1',
            'body' => 'order_created_successfully',
            'status' => $order['status'],
            'user_id' => $order['user_id'],
            'order_id' => $order['id'],
            'order_number' => $order['order_number'],
        ];

        $user->notify((new OrderStatusNotification($data)));

        return $this->respondMessage('تم إنشاء الطلب بنجاح');
    }

    public function getOrders(Request $request)
    {
        $user = auth('api')->user();
        $orders = Order::query()->WithFilters($request)->where('user_id', $user->id)->paginate(10);
        return $this->respondWithPagination(OrdersIndexResource::collection($orders));
    }

    public function getOrder($orderId)
    {
        $order = Order::query()->find($orderId);
        if (!$order) {
            return $this->respondError('الطلب غير موجود');
        }

        return $this->respondData(new OrdersResource($order));
    }

}

