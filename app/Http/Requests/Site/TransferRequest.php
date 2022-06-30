<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\BankAccount;

class TransferRequest extends FormRequest
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
            'receiver'          => ['required', 'string', 'exists:bank_accounts,account_number',
                function($attribute, $value, $fail)
                {
                    if($this->input('account_number') == $value)
                    {
                        return $fail("Cannot transfer to the same account.");
                    } 
                }
            ],
            'amount'            => ['required', 'numeric',
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
