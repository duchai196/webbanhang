<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name'=>'required',
            'price'=>'min:0',
            'sale_price'=>'min:0',
        ];
    }
    public function message(){
        return [
            'name.required'=>'Bạn chưa  nhập tên sản phẩm',
            'price.min'=>'Giá phải lớn hơn hoặc bằng 0',
            'sale_price.min'=>'Giá phải lớn hơn hoặc bằng 0',
            
        ];
    }
}
