<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style_mizukoshi.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="signup d-flex flex-column ">
            <form action="{{ route('userCreate') }}" method="POST">
                @csrf
                <h1 class="title">アカウント登録</h1>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="inputarea">
                    <label for="exampleFormControlInput1" class="form-label" autofocus>ユーザーネーム</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="inputarea">
                    <label for="exampleFormControlInput1" class="form-label">メールアドレス</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="inputarea">
                    <label for="exampleFormControlInput1" class="form-label">パスワード</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div>
                    <label for="exampleFormControlInput1" class="form-label">パスワード(確認）</label>
                    <input type="password" name="confirm" class="form-control">
                </div>
                <div class="signupbtn d-grid ">
                    <input type="submit" value="アカウント作成" class="button">
                </div>
                <div class="account">
                    <a href="{{ url('/')}}">ログインする</a>
                </div>
        </div>
        </form>
    </div>

    <script src="sample.js"> </script>
</body>

</html>