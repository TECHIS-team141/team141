<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function showSignup()
    {
        return view('account.signup');
    }

    public function userCreate(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm' => [
                'required',
                'same:password',
            ]
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->role = 1;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/');
    }

    public function accountHome()
    {
        return view('account.home');
    }

    public function userlogin(Request $request)
    {
        // dd($request->all());

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $msg = 'ログイン成功';

            return view('account.home', ['msg' => $msg]);
        }
        return back()->withErrors([
            'Login_Error' => 'メールアドレス又はパスワードが間違っています',

        ]);
    }
    public function userlogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
