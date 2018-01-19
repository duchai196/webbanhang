<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6|max:20',
            'password_confirmation'=>'required|min:6|max:20| same:password'
        ];
    }
    public function messages()
    {
        return [
                'name.required'=>'Bạn chưa nhập tên',
                'email.required'=>'Bạn chưa nhập email',
                'email.unique'=>'Email này đã có người sử dụng',
                'email.email'=>'Vui lòng nhập đúng định dạng email'
        ];  
    }
}
