<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'employee_id' => 'required|numeric|digits_between:2,5',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
        ];
    }
}
