<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'address'=>'required',
            'email'=>'required|email|unique',
            'phone'=>'required|numeric|digits_between:10,12,'
        ];
    }
    public  function  messages ()
    {
        return [
            'name.required'=>'Bạn chưa nhập họ tên',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn nhập   chưa đúng định dạng email',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
        ];
    }
}
