<?php

namespace App\Http\Requests\Admin\Order;

use App\Rules\General\NationalityProcessRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrdersFormRequest extends FormRequest
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
    public function rules(): array
    {
        if (Request()->route()->named('admin.orders.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.orders.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'worker_id' => ['required', new NationalityProcessRule($this->input('worker_id')),
                'exists:workers,id', Rule::unique('orders', 'worker_id')->where(function ($query) {
                    return $query->where('user_id', $this->input('user_id'));
                })],

        ];
    }

    public function updateRules(): array
    {
        return [
            'order_process' => 'required|array',
            'status' => 'required',
            'order_process.*.process_id' => 'required|exists:order_processes,id',
            'order_process.*.start_date' => 'nullable|date',
            'order_process.*.end_date' => 'nullable|date',
            'order_process.*.status' => 'required|in:pending,completed',
            'notes' => 'nullable|array',
            'total_price' => 'nullable|numeric',
            'amount_paid' => 'nullable|numeric',
        ];
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {

        $this->merge([
            'order_id' => $this->route('order_id'),
        ]);
    }

}
