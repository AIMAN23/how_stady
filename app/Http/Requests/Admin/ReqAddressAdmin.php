<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReqAddressAdmin extends FormRequest
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
            'country' => 'required|max:255',
            'cite'  => 'required|max:255',
            'street'=>'required|max:255',
            'country_code' => 'required|numeric',//zip
            'zip' => 'required|numeric',
        ];
    }
}
