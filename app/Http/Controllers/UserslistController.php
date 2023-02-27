<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function initialize()
    {
        $users = User::all();
        $users = User::sortable()->paginate(10);
        return view('userslists.index', ['forms' => $forms]);
        return view('list', ['users' => $users, 'sort' => $sort]);
    }

    /**
     * ユーザー登録画面
     * 
     * 
     */
    public function form()
    {
        return view('userslists.form');
    }

    /**
     * ユーザーデータ登録
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name' => 'required|max:255','email'=>'required', ]);

        // ユーザーデータ作成
        User::create(['id' => 0, 'name' => $request->name, 'email' =>$request->email, ]);
        return redirect('/userslists');
    }

    /**
     * ユーザー情報編集画面
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $userslists = User::find($id);
        if (is_null($userslists)) {
            \Session::flash('err_msg', 'エラーです');
            return redirect(route('userslists'));
        }
        return view('userslists.edit',[
            'userslists' =>$userslists
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
        
        $userdata->update([
            'name' => $request->name,
            'email' => $request->email,
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

}