<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }

        return view('users.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::guard('web')->attempt($credentials)) {
            return redirect()->back()->withInput($credentials)->with('message', __('Invalid information'));
        }
        if (!Auth::guard('web')->user()->isActive()) {
            Auth::guard('web')->logout();

            return redirect()->back()->withErrors(['active' => 'Account is not active.']);
        }
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function showAdminLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }

        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::guard('admin')->attempt($credentials)) {
            return redirect()->back()->withInput();
        }
        if (!Auth::guard('admin')->user()->isActive()) {
            Auth::guard('admin')->logout();

            return redirect()->back()->withErrors(['active' => 'Account is not active.']);
        }
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
