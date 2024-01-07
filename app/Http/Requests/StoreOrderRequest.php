<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'user_id' => 'required|numeric',
            'payment_method' => 'required|string',
            'is_paid' => 'required|string',
            'receiver_name' => 'required|string',
            'status' => 'required|string',
            // 其他訂單相關屬性的驗證...
        ];
    }
}
