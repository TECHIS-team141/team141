<h1>詳細確認</h1>
<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ユーザー一覧</title>
</head>

<body> -->
    <!-- <div style="width: 5000px; margin: 100px auto;">
        <div style="text-align:right;">
            <a href="/register"> >>登録 </a>
        </div> -->
        <!-- <div>
            <table border="1" style="margin: 10px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>メールアドレス</th>
                        <th> </th>
                    </tr>
                </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id }}</td>  
                    <td>{{$user->user_name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            </tbody>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html> -->

    <!-- <h4>ユーザー一覧</h4>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table> -->

<!-- <!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <title>ユーザー一覧</title>
            <style>
                table {
                border-collapse: collapse;
                width: 100%;
                }
                th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                }
                th {
                background-color: #f2f2f2;
                }
            </style>
        </head>

        <body>

        <h4>ユーザー一覧</h4>

        <form method="GET" action="{{ route('users.index') }}">
            <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
            <div>
                <button type="submit">検索</button>
                <button>
                    <a href="{{ route('users.index') }}" class="text-white">
                        クリア
                    </a>
                </button>
            </div>
        </form>

        @foreach($users as $user)
            <a href="{{ route('users.show', ['user_id' => $user->id]) }}">
                {{ $user->name }}
            </a>
        @endforeach

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><button onclick="editUser({{ $user->id }})">編集</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        </body>

    </html> -->

<!-- resources/views/user.blade.php -->

    @extends('layouts.app')
    @section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            ID
        </div>
        
    <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')

    <!-- バリデーションエラーの表示に使用-->

    <!-- ユーザー登録フォーム -->
        <form action="{{ url('user') }}" method="POST" class="form-horizontal">
            @csrf

    <!-- ユーザーの名前 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="user_name" class="form-control">
                </div>
            </div>

    <!-- ユーザー登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- User: 既に登録されてるユーザーのリスト -->

@endsection