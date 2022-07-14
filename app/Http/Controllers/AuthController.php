<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use App\Models\User;
use App\Classes\GenerateAccountNumber;
use App\Models\BankAccount;
use App\Http\Requests\Auth\RegisterAccountRequest;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']]))
        {
            return redirect('/');
        }
        else
        {
            return back()->with(['errors' => collect(['Wrong username or password'])]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterAccountRequest $request)
    {
        DB::beginTransaction();

        $data = $request->validated();

        $user = User::create([
            'username'          => $data['username'],
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'middle_name'       => $data['middle_name'] ?? NULL,
            'password'          => bcrypt($data['password'],),
            'role'              => 'user',
        ]);

        $bankAccount = BankAccount::create([
            'user_id'           => $user->id,
            'account_number'    => $data['account_number'] ?? GenerateAccountNumber::create($user->id),
            'balance'           => $data['balance'] ?? 0,
        ]);

        DB::commit();

        return redirect()->route('show-login');
    }
}
