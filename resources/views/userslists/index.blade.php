<!DOCTYPE html>
<html lang="ja">
@extends('userslists.layout')
@section('title', 'ユーザー一覧')
@section('content')
<head>
    <meta charset="UTF-8">
        <title>ユーザー一覧</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-md-10 col-md-offset-2">
    <h4>ユーザー一覧</h4>
        @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
        @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped userslist-table">
                <thead>
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>権限</th>
                    <th>&nbsp;</th>
                </thead>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if($user->role ==1) 管理者 @else 利用者 @endif</td>
                    <td><button type="button" onclick="location.href='{{ route('userslistsedit', ['id' => $user->id]) }}'" class="btn btn-primary">編集</button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    {!! $users->links() !!}
</body>
</html>
@endsection