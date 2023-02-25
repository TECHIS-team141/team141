@extends('layouts.app')
 
@section('content')
 
<div class="btn-top">
    <!-- 検索ボタン-->
    <div class="search-btn">
        <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力">
                <button class="btn btn-primary" type="submit" id="button-addon2">検索</button>
        </div>
    </div>
    <!-- 商品登録遷移ボタン-->
    <div class="register-btn">
        <button class="btn btn-secondary" type="button" id="button-addon2">商品登録</button>
    </div>
</div>

<!-- タスク一覧表示 -->
@if (count($items) > 0)
<div class="card">
  <h5 class="card-header">
        商品一覧
</h5>
    <div class="card-body">
        <table class="table table-striped item-table">
 
            <!-- テーブルヘッダ -->
            <thead>
                <th scope="col">ID</th>
                <th scope="col">ユーザーID</th>
                <th scope="col">名前</th>
                <th scope="col">種別</th>
                <th scope="col">更新日時</th>
                <th scope="col">詳細</th>
            </thead>
 
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <!-- タスク名 -->
                    <td class="table-text">
                        <div>{{ $item->id }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $item->user_id }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $item->name }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $item->type }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $item->created_at }}</div>
                    </td>
                    <td class="table-text">
                    <a href="#">詳細情報</a>
                    </td>
 
                    <td>
                        <!-- TODO: 削除ボタン -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection