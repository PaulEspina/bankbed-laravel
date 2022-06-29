<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

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
}
