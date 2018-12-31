<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'sltCate'=>'required',
            'txtCateName'=>'required|unique:categories,name'
        ];
    }

    public function messages()
    {
        return [
            'sltCate.required'=>'Bạn phải chọn thể loại',
            'txtCateName.required'=>'Bạn chưa nhập vào chủ để',
            'txtCateName.unique'=>'Chủ đề này đã tồn tại'
        ];
    }
}
