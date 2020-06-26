<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step1 extends FormRequest
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
          'name'  => 'required|max:255',
          'bransh'  => 'required|max:255',
          'email' => 'required|max:100|email|unique:schools',
          'wep'  => 'required|max:100|unique:schools',
          'tel' => 'required|max:255',
          'fax' => 'required|max:255',
          'logo' => 'mimes:png,jpg,jpeg',
          'country' => 'required|max:255',
          'cite'  => 'required|max:255',
          'zip' => 'required|numeric',
        ];
    }


    public function messages()
    {

        return [
          // 'name_ar.required' => __('messages.offer name required'),
          // 'name_en.required' => __('messages.offer name required'),
          // 'name_ar.unique' => 'اسم العرض موجود ',
          // 'name_en.unique' => 'Offer name  is exists ',
          // 'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
          // 'price.required' => 'السعر مطلوب',
          // 'details_ar.required' => 'ألتفاصيل مطلوبة ',
          // 'details_en.required' => 'ألتفاصيل مطلوبة ',
          // 'photo.required' =>  'صوره العرض مطلوب',
          'logo.mimes' =>  'الصورة غير صالحة',

        ];
    }

}
