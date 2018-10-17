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
            'name' => 'nullable',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'is_host' => 'bool',
            'date_of_birth' => 'required|date|date_format:Y-m-d'
        ];
    }
}
