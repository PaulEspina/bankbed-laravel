<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\BankAccount;

class WithdrawRequest extends FormRequest
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
            'amount'            => ['numeric',
                function($attribute, $value, $fail)
                {
                    $bankAccount = BankAccount::where('account_number', $this->input('account_number'))->first();
                    if($bankAccount->balance < $value)
                    {
                        return $fail("Not enough balance.");
                    }
                },
            ]
        ];
    }
}
