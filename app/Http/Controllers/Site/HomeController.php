<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    public function welcome()
    {
        $user = Auth::user();
        if($user->role == 'admin')
        {
            return redirect('/dashboard');
        }
        return view('site.welcome');
    }
}
