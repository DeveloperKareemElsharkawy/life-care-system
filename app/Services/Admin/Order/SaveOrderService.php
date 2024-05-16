<?php


namespace App\Services\Admin\Order;

use App\Http\Controllers\API\BaseController;
use App\Models\Order;
use App\Models\OrderProcess;
use App\Models\Worker;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SaveOrderService extends BaseController
{

    /**
     * @param $data
     * @return string
     */
    public function save($data)
    {
        $worker = Worker::query()->with('nationality.ProcessSteps')->find($data['worker_id']); // Selected Worker

        $generatedTrackingNumber = 'EA' . (hexdec(substr(uniqid(), 0, 9)) + (int)rand(1, 9)); // Generate Track number For Order

        $order = Order::query()->create([ // making Order
            'user_id' => $data['user_id'],
            'worker_id' => $worker->id,
            'order_number' => $generatedTrackingNumber,
        ]);

        $processStepsLoop = 0;
        foreach ($worker->nationality->processSteps as $processStep) {// attach Processes from Nationality To Order
            OrderProcess::query()->create([
                'order_id' => $order->id,
                'process_id' => $processStep->id,
                'start_date' => $processStepsLoop == 0 ? now() : null,
            ]);

            $processStepsLoop++;
        }

        return $order;
    }
}
