<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'quantity' => 'required',
            'recipient_name' => 'required|string', // 新增收禮者姓名的驗證規則
            'payment_method' => 'required|string', // 新增付款方式的驗證規則
            // 其他商品和訂單相關屬性的驗證...
        ];
    }
}
