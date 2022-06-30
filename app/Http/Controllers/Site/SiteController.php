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
use App\Http\Requests\Site\TransferRequest;

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

        $bankAccount = BankAccount::where('account_number', $data['account_number'])->first();

        $transaction = new Transaction;
        $transaction->user_id           = Auth::user()->id;
        $transaction->sender            = $data['account_number'];
        $transaction->amount            = $data['amount'];
        $transaction->running_balance   = $bankAccount->balance - $data['amount'];
        $transaction->type      = 'withdraw';
        if($transaction->save())
        {
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

        $bankAccount = BankAccount::where('account_number', $data['account_number'])->first();

        $transaction = new Transaction;
        $transaction->user_id           = Auth::user()->id;
        $transaction->receiver          = $data['account_number'];
        $transaction->amount            = $data['amount'];
        $transaction->running_balance   = $bankAccount->balance + $data['amount'];
        $transaction->type              = 'deposit';
        if($transaction->save())
        {
            $bankAccount->balance = $bankAccount->balance + $data['amount'];
            $bankAccount->save();
        }

        DB::commit();

        return back()->with(['message' => 'Success!']);
    }

    public function transfer()
    {
        $bankAccounts = BankAccount::where('user_id', Auth::user()->id)->get()->pluck('account_number', 'account_number');
        return view('site.transfer')->with('bankAccounts', $bankAccounts);
    }

    public function submitTransfer(TransferRequest $request)
    {
        DB::beginTransaction();

        $data = $request->validated();

        $sender = BankAccount::where('account_number', $data['account_number'])->first();
        $receiver = BankAccount::where('account_number', $data['receiver'])->first();

        $transaction = new Transaction;
        $transaction->user_id           = Auth::user()->id;
        $transaction->sender            = $data['account_number'];
        $transaction->receiver          = $data['receiver'];
        $transaction->amount            = $data['amount'];
        $transaction->running_balance   = $sender->balance - $data['amount'];
        $transaction->type              = 'transfer';
        if($transaction->save())
        {
            $sender->balance = $sender->balance - $data['amount'];
            $sender->save();
        }

        $transaction = new Transaction;
        $transaction->user_id           = $receiver->user->id;
        $transaction->sender            = $data['account_number'];
        $transaction->receiver          = $data['receiver'];
        $transaction->amount            = $data['amount'];
        $transaction->running_balance   = $receiver->balance + $data['amount'];
        $transaction->type              = 'transfer';
        if($transaction->save())
        {
            $receiver->balance = $receiver->balance + $data['amount'];
            $receiver->save();
        }

        DB::commit();

        return back()->with(['message' => 'Success!']);
    }
}
