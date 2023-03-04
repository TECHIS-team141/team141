<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
        <title>ユーザー一覧</title>
            <style>
                table {border-collapse: collapse;width: 100%;}
                th, td {border: 1px solid #ddd;padding: 8px;text-align: left;}
                th {background-color: #f2f2f2;}
            </style>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    {{-- @include('parts.nav') --}}
    <h4>ユーザー一覧</h4>
{{-- {{ $users->appends(['name' => $name, 'email' => $email])->links()  }} --}}
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
                <td><a href="{{ route('userslistsedit', ['id' => $user->id]) }}" class="btn btn-primary">編集</a></td>
                @can('admin-higher')
                @endcan
            </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>