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
            'txtUser'=>'required|unique:users,username',
            'txtPass'=>'required',
            'txtRepass'=>'required|same:txtPass'
        ];
    }

    public function messages() {
        return [
            'txtUser.required'=>'Bạn phải nhập vào username',
            'txtUser.unique'=>'Username đã tồn tại',
            'txtPass.required'=>'Bạn phải nhập vào mật khẩu',
            'txtRepass.required'=>'Bạn phải lại mật khẩu',
            'txtRepass.same'=>'Mật khẩu nhập lại chưa khớp',
        ];
    }

}
