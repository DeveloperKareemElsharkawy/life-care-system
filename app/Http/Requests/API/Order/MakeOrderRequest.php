<?php

namespace App\Http\Requests\API\Order;

use App\Rules\General\NationalityProcessRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MakeOrderRequest extends FormRequest
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
        $user = auth('api')->user();

        return [
            'worker_id' => ['required', new NationalityProcessRule($this->input('worker_id')), 'exists:workers,id', Rule::unique('orders', 'worker_id')->where(function ($query) use ($user) {
                return $query->where('user_id', $user->id);
            })],
            'user_id' => 'required|exists:users,id',

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
            'user_id' => auth('api')->user()->id,
        ]);
    }

}
