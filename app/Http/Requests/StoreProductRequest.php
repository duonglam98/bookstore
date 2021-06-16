<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CustomDes;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'author' => 'required',
            'image' => 'image',
            'code' => 'required|unique:books',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required',
        ];

        if ($this->method() == 'PUT') {
            $rules['code'] = [
                'required',
                Rule::unique('books')->ignore($this->book),
            ];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên sách là bắt buộc. Mời nhập lại!',
            'price.numeric' => 'Giá của sản phẩm phải nhập vào chữ số. Mời nhập lại!',
            'description' => 'Bạn cần nhập mô tả sản phẩm!'
        ];
    }
}
