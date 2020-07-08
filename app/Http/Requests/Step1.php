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
          'wep'  => 'url|max:250|',
          'tel' => 'required|max:255',
          'fax' => 'max:50',
          'logo' => 'mimes:png,jpg,jpeg',
          'country' => 'required|max:255',
          'cite'  => 'required|max:255',
          'street'=>'required|max:255',
          'zip' => 'numeric|max:999999',
        ];
    }


    public function messages()
    {

        return [
          'name.required'  => 'اسم المدرسة مطلوب',
          'bransh.required'  => 'اسم الفرع مطلوب ',
          'email.required' => 'ايميل المدرسة مطلوب ',
          'email.unique' => 'لايمكن استخدام هاذا الايميل لانه موجود من قبل مدرسة اخرا',
          'wep.url'  => ' http://www.. ,https://www.. الموقع الالكتروني يجب ان يكون رابط',
          'wep.max'  => 'طول الرابط يجب ان لايزيد عن 250 حرف',
          'tel.required' => 'رقم الهاتف مطلوب',
          'fax.max' => ' رقم الفاكس طويل جدا اقصا حد 50 رقم',
          'logo.mimes' =>  'الصورة غير صالحة يجب ان تكون الصورة png ,jpg,jpeg',
          'country.required' => 'اسم الدولة مطلوب',
          'cite.required'  => 'المدينة مطلوبة',
          'street.required'=>'العنوان للحي مطلوب',
          // 'zip.' => 'يجب ان يكون الرمز البريدي ارقام',

        ];
    }

}
