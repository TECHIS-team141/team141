<?php

namespace App\Http\Controllers;

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
        $user->role = 0;
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

        $user = User::all()->where('email', $request->email)->first();

        if($user===null)
        {
            return back()->withErrors([
                'Login_Error' => '存在しないユーザーです',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/home');
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
