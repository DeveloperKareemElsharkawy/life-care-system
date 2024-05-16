<?php

namespace App\Http\Requests\Admin\Vehicles;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:40',
            'image' => 'required|image',
            'gallery' => 'required',
            'model' => 'required|min:3',
            'release_date' => 'required|min:3',
            'horse_power' => 'required|min:3',
            'gas_type' => 'required|min:2',
            'color' => 'required|min:2',
            'chassis_no' => 'required|min:2',
            'serial_number' => 'required|min:2',
            'car_capital' => 'required|min:2',
            'license_start_date' => 'required|',
            'license_end_date' => 'required',
            'plate_number' => 'required|min:6',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'owners' => 'required|array',
            'owners.*.owner_id' => 'required|exists:owners,id',
            'owners.*.percentage' => 'required|numeric|min:1|max:100',
        ];
    }


    public function prepareForValidation()
    {
        $startDate = strtotime($this->license_start_date);
        $endDate = strtotime($this->license_end_date);

        $this->merge([
            'owners' => array_values($this->owners),
            'license_start_date' => date('Y-m-d', $startDate),
            'license_end_date' => date('Y-m-d', $endDate),
        ]);
    }
}
