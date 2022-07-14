<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\BankAccount;

class RegisterAccountRequest extends FormRequest
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
            'username'      => 'required|string|unique:users',
            'password'      => 'required|string|confirmed',
            'first_name'    => 'required|string',
            'middle_name'   => 'nullable|string',
            'last_name'     => 'required|string',
        ];
    }
}
