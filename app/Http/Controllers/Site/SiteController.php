<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

use App\Models\Transaction;
use App\Models\BankAccount;
use App\Http\Requests\Site\WithdrawRequest;
use App\Http\Requests\Site\DepositRequest;

class SiteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'admin')
        {
            return redirect('/dashboard');
        }
        return view('site.index');
    }

    public function profile()
    {
        $bankAccounts = BankAccount::where('user_id', Auth::user()->id)->get();
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('site.profile')->with(['bankAccounts' => $bankAccounts, 'transactions' => $transactions]);
    }

    public function withdraw()
    {
        $bankAccounts = BankAccount::where('user_id', Auth::user()->id)->get()->pluck('account_number', 'account_number');
        return view('site.withdraw')->with('bankAccounts', $bankAccounts);
    }

    public function submitWithdraw(WithdrawRequest $request)
    {
        DB::beginTransaction();

        $data = $request->validated();

        $transaction = new Transaction;
        $transaction->user_id   = Auth::user()->id;
        $transaction->sender    = $data['account_number'];
        $transaction->amount    = $data['amount'];
        $transaction->type      = 'withdraw';
        if($transaction->save())
        {
            $bankAccount = BankAccount::where('account_number', $data['account_number'])->first();
            $bankAccount->balance = $bankAccount->balance - $data['amount'];
            $bankAccount->save();
        }

        DB::commit();

        return back()->with(['message' => 'Success!']);
    }

    public function deposit()
    {
        $bankAccounts = BankAccount::where('user_id', Auth::user()->id)->get()->pluck('account_number', 'account_number');
        return view('site.deposit')->with('bankAccounts', $bankAccounts);
    }

    public function submitDeposit(DepositRequest $request)
    {
        DB::beginTransaction();

        $data = $request->validated();

        $transaction = new Transaction;
        $transaction->user_id   = Auth::user()->id;
        $transaction->receiver  = $data['account_number'];
        $transaction->amount    = $data['amount'];
        $transaction->type      = 'deposit';
        if($transaction->save())
        {
            $bankAccount = BankAccount::where('account_number', $data['account_number'])->first();
            $bankAccount->balance = $bankAccount->balance + $data['amount'];
            $bankAccount->save();
        }

        DB::commit();

        return back()->with(['message' => 'Success!']);
    }
}
