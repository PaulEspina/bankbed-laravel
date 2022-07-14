<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
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
        return view('dashboard.index');
    }
}
