<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function loginPage()
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
    	return view('admin_login');
    }
}
