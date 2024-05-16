<?php

namespace App\Http\Requests\Admin\Pile;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class PileItemRequest extends FormRequest
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
    public function rules()
    {
        if (Request()->route()->named('admin.items.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.items.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'image' => 'required|image|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'status' => 'required|in:pending,active',
            'user_id' => 'nullable|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'pile_id' => 'exists:piles,id',
            'price' => 'nullable|numeric',
            'starting_price' => 'nullable|numeric',
            'price_type' => 'required|in:total_amount,any_amount,recurring_amount',
            'is_required' => 'required|boolean',
            'quantity' => 'nullable|integer',

        ];
    }

    public function updateRules(): array
    {
        return [
            'item_id' => 'required|exists:items,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'image' => 'sometimes|image|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'status' => 'required|in:pending,active',
            'user_id' => 'nullable|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'pile_id' => 'required|exists:piles,id',
            'price' => 'nullable|numeric',
            'starting_price' => 'nullable|numeric',
            'price_type' => 'required|in:total_amount,any_amount,recurring_amount',
            'is_required' => 'required|boolean',
            'can_view_quantity' => 'required|boolean',
            'quantity' => 'nullable|integer',
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
            'item_id' => $this->route('item_id'),
            'is_required' => (bool)$this['status'] == 'on',
            'can_view_quantity' => (bool)$this['status'] == 'on',
            'pile_id' => $this->route('pile_id'),
        ]);
    }

}
