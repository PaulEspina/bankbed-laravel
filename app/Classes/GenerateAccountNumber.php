<?php

namespace App\Classes;

use App\Models\BankAccount;

class GenerateAccountNumber
{
    public static function create($user_id)
    {
        $bankAccounts = BankAccount::where('user_id', $user_id)->get();

        $year = now()->year;
        $userId = $user_id;
        $userId = "$userId";
        if(strlen($userId) < 6)
        {
            $zeroesToAdd = 6 - strlen($userId);
            for($i = 0; $i < $zeroesToAdd; $i++)
            {
                $userId = "0" . $userId;
            }
        }
        $accountNumber = $year . "-" . $userId . "-" . $bankAccounts->count();

        return $accountNumber;
    }
}
