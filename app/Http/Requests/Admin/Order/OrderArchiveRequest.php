<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderArchiveRequest extends FormRequest
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

    public function rules()
    {
        if (Request()->route()->named('admin.orders_archives.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.orders_archives.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
             'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar',

        ];
    }

    public function updateRules(): array
    {
        return [
            'orderArchive_id' => 'required|exists:order_archives,id',
            'title' => 'required|string|max:255',
            'description' => 'string',
            'images' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar',

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
            'orderArchive_id' => $this->route('orders_archive_id'),
            'order_id' => $this->route('order_id'),
        ]);
    }

}
