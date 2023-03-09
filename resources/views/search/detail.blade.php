@extends('layouts.app')
 
@section('content')

@include('parts.nav')

<div class="detail-content">
    <!-- 商品登録遷移ボタン-->
    <div class="list-btn">
        <button class="btn btn-secondary" type="button" id="button-addon2"><a href="search">商品一覧</a></button>
    </div>

    <!-- 商品詳細情報 -->
    <div class="item-detail">
        @if(isset($items))
        @foreach($items as $item)
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-25 p-3 bg-light">項目</li>
            <li class="list-group-item w-50 p-3 bg-light">詳細情報</li>
            </ul>
            <ul class="list-group list-group-horizontal">
            <li class="list-group-item w-25 p-3">ID</li>
            <li class="list-group-item w-50 p-3">{{ $item->id }}</li>
            </ul>
            <ul class="list-group list-group-horizontal-sm">
            <li class="list-group-item w-25 p-3">本のタイトル</li>
            <li class="list-group-item w-50 p-3">{{ $item->name }}</li>
            </ul>
            <ul class="list-group list-group-horizontal-sm">
            <li class="list-group-item w-25 p-3">カテゴリ</li>
            <li class="list-group-item w-50 p-3">@switch ($item->type) 
                        @case(1)
                            漫画
                            @break;
                        @case(2)
                            小説
                            @break;
                        @case(3)
                            スポーツ
                            @break;
                        @case(4)
                            料理
                            @break;
                        @case(5)
                            学習
                            @break;
                    @endswitch</li>
            </ul>
            <ul class="list-group list-group-horizontal-sm">
            <li class="list-group-item w-25 p-3">在庫</li>
            <li class="list-group-item w-50 p-3">
            @if($item->status == 0)
                        無
                        @else
                        有
                        @endif    
                    </li>
            </ul>
            <ul class="list-group list-group-horizontal-sm">
            <li class="list-group-item w-25 p-3">登録日時</li>
            <li class="list-group-item w-50 p-3">{{ $item->created_at }}</li>
            </ul>
            <ul class="list-group list-group-horizontal-sm">
            <li class="list-group-item w-25 p-3">更新日時</li>
            <li class="list-group-item w-50 p-3">{{ $item->updated_at }}</li>
            </ul>
            <ul class="list-group list-group-horizontal-sm">
            <li class="list-group-item w-25 p-3">詳細</li>
            <li class="list-group-item w-50 p-3">{{ $item->detail }}</li>
            </ul>
            @endforeach
            @endif
    </div>



@endsection