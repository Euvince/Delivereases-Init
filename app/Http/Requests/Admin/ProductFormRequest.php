<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'file'],
            'status' => ['required', 'string'],
            'rating' => ['required'],
            'isPopular' => ['required', 'boolean'],
            'description' => ['required', 'string'],
            'order_id' => ['required', 'exists:commandes,id']
        ];
    }
}
