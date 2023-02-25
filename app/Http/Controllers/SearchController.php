<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item; //アイテムモデルを使える

class SearchController extends Controller
{
    // public function index(Request $request){
        
    //     $keyword = $request->input('keyword');
    //     $query = Item::query();
    // }


    /**
        * アイテム一覧
        *
        * @param Request $request
        * @return Response
        */
        public function index(Request $request)
        {
            $items = Item::orderBy('created_at', 'asc')->get();
            return view('search.index', [
                'items' => $items,
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
