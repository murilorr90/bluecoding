<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserAPIRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'is_host' => 'bool',
            'date_of_birth' => 'required|date',
            'latitude' => 'regex:/^-?\d{1,2}\.\d{1,6}$/',
            'longitude' => 'regex:/^-?\d{1,2}\.\d{1,6}$/'
        ];
    }
}
