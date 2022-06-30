<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use DB;

use App\Models\BankAccount;
use App\Http\Requests\Dashboard\BankAccounts\StoreBankAccountRequest;
use App\Http\Requests\Dashboard\BankAccounts\UpdateBankAccountRequest;

class BankAccountController extends Controller
{
    public function index()
    {
        return view('dashboard.bank-accounts.index')->with(['bankAccounts' => BankAccount::all()]);
    }

    public function create()
    {
        return view('dashboard.bank-accounts.create');
    }

    public function store(StoreBankAccountRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $bankAccounts = BankAccount::where('user_id', $data['user_id'])->get();

        $year = now()->year;
        $userId = $data['user_id'];
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

        $bankAccount = new BankAccount();
        $bankAccount->user_id           = $data['user_id'];
        $bankAccount->account_number    = $data['account_number'] ?? $accountNumber;
        $bankAccount->balance           = $data['balance'] ?? 0;
        $bankAccount->save();

        DB::commit();

        return redirect()->route('dashboard.bank-accounts.index');
    }

    public function show(BankAccount $bankAccount)
    {
        return view('dashboard.bank-accounts.show')->with(['bankAccount' => $bankAccount]);
    }

    public function edit(BankAccount $bankAccount)
    {
        return view('dashboard.bank-accounts.edit')->with(['bankAccount' => $bankAccount]);
    }

    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        DB::beginTransaction();

        $data = $request->validated();

        if(BankAccount::where('id', '!=', $bankAccount->id)->where('account_number', $data['account_number'])->first())
        {
            return back()->with(['errors' => collect(['Account number is not unique'])]);
        }

        $bankAccount->user_id           = $data['user_id'] ?? $bankAccount->user_id;
        $bankAccount->account_number    = $data['account_number'];
        $bankAccount->balance           = $data['balance'] ?? $bankAccount->balance;
        $bankAccount->save();

        DB::commit();

        return redirect()->route('dashboard.bank-accounts.index');
    }

    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return redirect()->route('dashboard.bank-accounts.index');
    }
}
