<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAPIRequest extends FormRequest
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
            'email' => 'email|unique:users,email,' . request()->route('user'),
            'name' => 'nullable',
            'first_name' => 'string',
            'last_name' => 'string',
            'is_host' => 'bool',
            'date_of_birth' => 'date|date_format:Y-m-d'
        ];
    }
}
