<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_type'=>'required',
            'name'=>'required|unique:categories'
        ];
    }
    public function message(){
        return [
            'category_type.required'=>'Bạn chưa chọn thể loại danh mục',
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.unique'=>'Tên danh mục đã tồn tại'
        ];
    }
}
