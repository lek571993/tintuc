<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'sltCate' => 'required',
            'txtTitle' => 'required',
            'txtAuthor' => 'required',
            'txtIntro' => 'required',
            'txtFull' => 'required',
            'newsImg' => 'required|image',
        ];
    }

    public function messages() {
        return [
            'sltCate.required' => 'Bạn phải chọn loại tin tức',
            'txtTitle.required' => 'Bạn phải nhập vào chủ đề',
            'txtAuthor.required' => 'Bạn phải nhập vào tác giả',
            'txtIntro.required' => 'Bạn chưa nhập vào trích dẫn',
            'txtFull.required' => 'Vui lòng nhập vào nội dung đầy đủ',
            'newsImg.required' => 'Chưa có ảnh cho bài viết',
            'newsImg.image' => 'Ảnh được chọn chưa đúng định dạng'
        ];
    }
}
