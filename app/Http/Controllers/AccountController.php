<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    //アカウント登録画面
    public function showSignup()
    {
        return view('account.signup');
    }

    //アカウント作成処理
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
    // ログイン認証
    public function userlogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //入力されたメールアドレスが存在しない場合、「存在しないユーザーです」と表示させる
        $user = User::all()->where('email', $request->email)->first();

        if($user===null)
        {
            return back()->withErrors([
                'Login_Error' => '存在しないユーザーです',
            ]);
        }
        //入力されたメールアドレス、パスワードの認証
        //ログイン成功⇒ホーム画面へ遷移
        //ログイン失敗⇒ログイン画面にエラー表示
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/home');
        }
        return back()->withErrors([
            'Login_Error' => 'メールアドレス又はパスワードが間違っています',

        ]);
    }
    
    //ログアウト処理
    public function userlogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
?>