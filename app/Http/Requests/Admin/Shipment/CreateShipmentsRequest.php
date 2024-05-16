<?php

namespace App\Http\Requests\Admin\Shipment;

use Illuminate\Foundation\Http\FormRequest;
use \DateTime;

class CreateShipmentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          return [
            'tracking_number' => 'required|string|max:255|unique:shipments,tracking_number',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i:s',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'trailer_id' => 'required|integer|exists:trailers,id',
            'driver_id' => 'required|integer|exists:drivers,id',
            'client_id' => 'required|integer|exists:clients,id',
            'destination_id' => 'required|integer|exists:client_destinations,id',
            'cargo_weight' => 'required|numeric',
            'pocket_money' => 'required|numeric',
            'total_shipment_cost' => 'required|numeric',
        ];
    }

    public function prepareForValidation()
    {
        $startDate = strtotime($this->start_date);

        $new_time = DateTime::createFromFormat('h:i A', $this->request->get('start_time'));
        $time_24 = $new_time->format('H:i:s');

        $this->merge([
            'start_date' => date('Y-m-d', $startDate),
            'start_time' => $time_24,
        ]);
    }

}
