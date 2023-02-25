<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item; //アイテムモデルを使える

class SearchController extends Controller
{
    /**
        * アイテム一覧
        *
        * @param Request $request
        * @return Response
        */
        public function index(Request $request)
        {
            //ユーザー一覧を取得
            $items = Item::all();

            //検索フォームで入力されたキーワード受け取り
            $keyword = $request->input('keyword');

            // データベースからデータを取得する命令
            $query = Item::query();

            // 名前か詳細と部分一致するものがあれば、$queryとして保持される
            if (!empty($keyword)) {               
            $query->where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('detail', 'LIKE', '%'.$keyword.'%');          
            
            // 上記で取得した$queryを$Itemsに代入
            $items = $query->get();

            // 何もキーワード検索がなければ全データを表示
            }else{
                $items = Item::all();
            }

            return view('search.index', [
                'items' => $items,
                'keyword' => $keyword,
            ]);
        }

        //Itemモデルから登録順にデータを取得してsearch.indexのブレードファイルに表示。blade上では$itemsと記載することでデータを取得。

           /**
        * アイテム詳細
        *
        * @param Request $request
        * @return Response
        */
        public function detail(Request $request)
        {
            $items = Item::orderBy('created_at', 'asc')->get();
            return view('search.detail', [
                'items' => $items,
            ]);
        }

}
