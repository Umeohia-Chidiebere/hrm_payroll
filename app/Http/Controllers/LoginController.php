<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function index()
    {
        return view('pages.login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    function login_user( Request $request )
    {
            $this->validate($request, ['email' => 'required', 'password' => 'required' ]);
            ($request->has('remember_me') ) ? $remember = true : $remember = false ;
            $confirm_user = Auth::attempt( request(['email', 'password']), $remember );
            if (! $confirm_user): return redirect()->back()->withInput()->withErrors(' Invalid Login details...'); endif;
            if( auth()->user()->is_deleted ){
                Auth::logout();
                return redirect()->back()->withInput()->withErrors('Invalid Login details...');
            }    
            return redirect()->route('dashboard');   
    }
    
}

