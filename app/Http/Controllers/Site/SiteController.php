<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

use App\Models\Transaction;
use App\Models\BankAccount;
use App\Http\Requests\Site\WithdrawRequest;

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
        return view('site.profile');
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
}
