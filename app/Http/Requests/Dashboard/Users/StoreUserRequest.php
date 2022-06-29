<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'      => 'required|string|min:3|max:64|unique:users',
            'first_name'    => 'required|string',
            'middle_name'   => 'nullable|string',
            'last_name'     => 'required|string',
            'password'      => 'required|string|max:64',
            'role'          => 'required|string',
        ];
    }
}
