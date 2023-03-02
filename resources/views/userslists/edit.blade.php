@extends('layouts.app')

@section('title', '編集画面')

@section('content')

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container small text-center">
    <h4>ユーザー編集 ID:{{ $userslists->id }}</h4>
    <form action = "{{ route('userslistsupdate' ,['id' =>$userslists->id])}}" method = "POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group center-block">
            <label for="name">名前</label>
            <input type="text" name="name" class="form-control align-self-center" value="{{ $userslists->name }}">
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" class="form-control col align-self-center" value="{{ $userslists->email }}">
        </div>
        <p class="form-group">権限<br>
            <input type="radio" name="role" value="{{ $userslists->role }}">管理者
            <input type="radio" name="role" value="{{ $userslists->role }}">一般
        </p>
            <input type="submit" class="btn border border-dark" value="編集">
    </form>
    <form method="POST" action="{{route('userslistsdelete',['id' =>$userslists->id])}}">
        @csrf
        <button type="submit" class="btn border border-dark center-block">削除</button>
    </form>
</div>
<a href="/userslists"> >>戻る </a>
@endsection