@extends('userslists.layout')
@section('title', 'ユーザー編集')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集画面</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container small text-center">
    <h3 class="mt-4">編集画面</h3>
    <h4>ユーザー編集 ID:{{ $userslists->id }}</h4>
    <form method="post" action="{{ route('userslistsupdate' ,['id' =>$userslists->id])}}" enctype="multipart/form-data">
    @csrf
        <div class="form-group center-block">
            <label for="name">名前</label>
            <input type="text" name="name" class="form-control align-self-center" value="{{ old('name', $userslists->name) }}">
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" class="form-control col align-self-center" value="{{ old('email', $userslists->email) }}">
        </div>
        <p class="form-group">権限<br>
            <input type="radio" name="role" value="1" @if($userslists->role ==1) checked @endif>管理者
            <input type="radio" name="role" value="0" @if($userslists->role ==0) checked @endif>一般
        </p>
            <input type="submit" class="btn border border-dark bg-teal-700 float-right" value="編集">
    </form>
    <form method="post" action="{{route('userslistsdelete',['id' =>$userslists->id])}}">
    @csrf
        <button type="submit" class="btn border border-dark center-block" onClick="return confirm('削除してよろしいですか。');">削除</button>
    </form>
</div>
    <button type="button" onclick="location.href='{{ route('userslists') }}'" class="btn btn-primary">戻る</button>
</body>
</html>
@endsection