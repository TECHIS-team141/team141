<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // 商品一覧画面の表示
    public function main()
    {
      //itemsテーブルからidの昇順で取得
      $items = item::orderBy('id')->get();
  
      //viewを返す(compactでviewに$itemsを渡す)
      return view('item.main', compact('items'));
    }
    // 商品登録画面の表示
    public function create()
    {
        return view('item.create');
    }

    // 登録ボタンを押したら保存して商品一覧画面へ
    public function register(Request $request){

        $items = new Item();
        $items->name = $request->name;
        $items->user_id = 1;
        $items->status = 1;
        $items->type = $request->type;
        $items->detail = $request->detail;
        $items->save();

        return redirect('/item');

    }

    // 編集画面の表示
    public function edit(Request $request){

        $items = Item::where('id','=',$request->id)->first();

        return view('item.edit')->with([
            'item' => $items
        ]);
    }

    // 編集を保存して一覧画面へ
    public function update(Request $request){
        $items = Item::where('id','=',$request->id)->first();
    
        $items->name = $request->name;
        $items->user_id = 1;
        $items->status = $request->status;
        $items->type = $request->type;
        $items->detail = $request->detail;
        $items->save();

        return redirect('/item');
    }

    // データを削除する
    public function delete(Request $request){

        $items = Item::where('id','=',$request->id)->first();
        $items->delete();

        return redirect('/item');
    }
}
