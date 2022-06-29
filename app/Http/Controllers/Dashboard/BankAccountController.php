<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use DB;

use App\Models\BankAccount;
use App\Http\Requests\Dashboard\BankAccounts\StoreBankAccountRequest;
use App\Http\Requests\Dashboard\BankAccounts\UpdateBankAccountRequest;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.bank-accounts.index')->with(['bankAccounts' => BankAccount::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bank-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBankAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankAccountRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $year = now()->year;
        $userId = $data['user_id'];
        $userId = "$userId";
        if(strlen($userId) < 12)
        {
            $zeroesToAdd = 12 - strlen($userId);
            for($i = 0; $i < $zeroesToAdd; $i++)
            {
                $userId = "0" . $userId;
            }
            $userId = substr($userId, -7);
        }
        $accountNumber = $year . "-" . $userId;

        $bankAccount = new BankAccount();
        $bankAccount->user_id           = $data['user_id'];
        $bankAccount->account_number    = $data['account_number'] ?? $accountNumber;
        $bankAccount->balance           = $data['balance'] ?? 0;
        $bankAccount->save();

        DB::commit();

        return redirect()->route('dashboard.bank-accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        return view('dashboard.bank-accounts.show')->with(['bankAccount' => $bankAccount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        return view('dashboard.bank-accounts.edit')->with(['bankAccount' => $bankAccount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankAccountRequest  $request
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        DB::beginTransaction();

        $data = $request->validated();

        if(BankAccount::where('id', '!=', $bankAccount->id)->where('account_number', $data['account_number'])->first())
        {
            return back();
        }

        $bankAccount->user_id           = $data['user_id'] ?? $bankAccount->user_id;
        $bankAccount->account_number    = $data['account_number'] ??  $bankAccount->account_number;
        $bankAccount->balance           = $data['balance'] ?? $bankAccount->balance;
        $bankAccount->save();

        DB::commit();

        return redirect()->route('dashboard.bank-accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return redirect()->route('dashboard.bank-accounts.index');
    }
}
