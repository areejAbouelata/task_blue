<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'admin';

    protected $redirectTo = '/admin/courses';

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }

    public function showLoginForm()

    {

        return view('auth.adminLogin');

    }

    public function login(Request $request)

    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(url('/admin/courses'));

        }



        return back()->withErrors(['email' => 'Email or password are wrong.']);

    }

}
