<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //更新
    public function user(Request $request) 
    {
        $users = User::all();
        return view('user.user', ['users' => $users]);

        // ユーザー一覧をページネートで取得
        $users = User::paginate(20);

        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = User::query();

        // もし検索フォームにキーワードが入力されたら
        if ($search) 
        {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }

            // 上記で取得した$queryをページネートにし、変数$usersに代入
            $users = $query->paginate(20);

        }

        // ビューにusersとsearchを変数として渡す
        return view('user.user')
            ->with([
                'users' => $users,
                'search' => $search,
            ]);
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('user.show', compact('user'));
    }
}
