<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use DB;
use Auth;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->role != 'admin')
            {
                return redirect('/');
            }
    
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('dashboard.transactions.index')->with(['transactions' => Transaction::all()]);
    }

    public function show(Transaction $transaction)
    {
        return view('dashboard.transactions.show')->with(['transaction' => $transaction]);
    }
}
