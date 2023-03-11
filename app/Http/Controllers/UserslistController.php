<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class UserslistController extends Controller
{
    /**
     * ユーザーデータ一覧画面
     * 
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'asc')->get();
        $sort = $request->sort;
        $users = User::paginate(10);
        return view('userslists.index',['users' => $users]);
    }
    // public function initialize()
    // {
    //     $users = User::all();
    //     $users = User::sortable()->paginate(10);
    //     return view('userslists.index');
    // }

    /**
     * ユーザー登録画面
     * 
     * 
     */
    // public function create()
    // {
    //     return view('userslists.create');
    // }

    /**
     * ユーザーデータ登録
     * @param Request $request
     * @return Response
     */
    // public function store(Request $request)
    // {
    //     $inputs = $request->validate([
    //     'name' => 'require',
    //     'email' => 'requier',
    //     'role' => 'require',
    // ]);
    //     $user = new User();
    //     $user->name = $inputs['name'];
    //     $user->email = $inputs['email'];
    //     $user->role = $request->role;
    //     $user->save();
    //     return back();
    // }

    /**
     * ユーザー情報編集画面
     * @param int $id
     * @return view
     */
    public function edit(Request $request,$id)
    {
        $userslists = User::find($id);
        if (is_null($userslists)) {
            \Session::flash('err_msg', 'エラーです');
            return redirect(route('userslists'));
        }
        return view('userslists.edit',[
            'userslists' => $userslists,
        ]);
        
    }

    /**
     * ユーザーデータ編集
     * 
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $userdata = User::find($id);

        $inputs = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => [
                'required', 'same:password',
            ],
        ]);
        
        $userdata->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        $userdata->save();

        return redirect('userslists');
    }

    /**
     * ユーザーデータ削除
     * 
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        if(empty($id)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('userslists'));
        }
        try {
            User::destroy($id);
        }catch(\Throwable $e) {
            \DB::rollback();
            about(500);
        }
        \Session::flash('err_msg', '削除しました。');
        return redirect(route('userslists'));
    }

    public function message()
    {
        return [
            'name.required' => '名前は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'password.required' => 'パスワードは必須です。',
            'confirm_password.required' => '確認用パスワードは必須です。',
            'confirm_password.same' => 'パスワードと確認用パスワードが一致しません。',
        ];
    }

}