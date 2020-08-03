<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReqDataAdmin extends FormRequest
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
        //// "id"=>'required|string|max:100',
        //// "no"=>'required|string|max:100', 
        //// "uuid"=>'required|string|max:100', 
        //// "status"=>'required|string|max:100', 
        return [

            // "name"=>'required|string|max:100', 
            "f_name" => 'required|string|max:100',
            "p_name" => 'required|string|max:100',
            "l_name" => 'required|string|max:100',
            "gender" => 'required|integer|between:0,3',
            "nationality" => 'required|string|max:100',
            "birthdate" => 'date|date_format:Y-m-d', //|exists:table,column
            "email" => 'required|max:100|email',
            "mobile" => 'required|string|max:100',
            // "email_verified_at"=>'required|string|max:100', 
            // "remember_token"=>'required|string|max:100', 
            // "password"=>'required|string|max:100', 
            // "image_id"=>'required|string|max:100', 
            // "address_id"=>'required|string|max:100', 
            // "created_at"=>'required|string|max:100', 
            // "updated_at"=>'required|string|max:100', 
            // "deleted_at"=>'required|string|max:100', 
            // "added_on"=>'required|string|max:100', 
            // "read_at"=>'required|string|max:100',
            // 'country' => 'required|max:255',
            // 'cite'  => 'required|max:255',
            // 'country_code' => 'required|numeric',//zip
        ];
    }



    /**
     * messages
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         //
    //     ];
    // }
}
