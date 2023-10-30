<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'status' => ['required', 'string'],
            'libelle' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
            'orderDate' => ['required', 'date'],
            'totalPrice' => ['required'],
            'delivery_id' => ['required', 'exists:delivereases,id']
        ];
    }
}
