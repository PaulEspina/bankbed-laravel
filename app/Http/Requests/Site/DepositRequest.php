<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\BankAccount;

class DepositRequest extends FormRequest
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
            'account_number'    => 'required|string|exists:bank_accounts',
            'amount'            => 'required|numeric',
        ];
    }
}
