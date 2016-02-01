<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class tripValidation extends Request
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
            'region'      => 'required|max:75',
            'destination' => 'required',
            'date'        => 'required',

            // User info
            'name'        => 'required',
            'email'       => 'required',
            'telephone'   => 'required',
        ];
    }
}
