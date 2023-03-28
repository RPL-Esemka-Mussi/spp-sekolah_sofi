<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }

    public function authenticate(Request $request)
    {
        $validasidata = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($validasidata)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        $request->session()->regenerate();

        Auth::logout();
        return redirect('/login');
    }

}

?>
