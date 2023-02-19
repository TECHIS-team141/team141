<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</head>

<body>
<!-- @extends('layouts.app')
@section('content') -->
<div class="container">
    <div class="login d-flex flex-column ">
        <form action="#" method="post">
            <h1 class="title">商品管理システム</h1>
            <div class="inputarea">
                <label for="exampleFormControlInput1" class="form-label" required autofocus>メールアドレス</label>
                <input type="email" class="form-control">
            </div>
            <div class="inputarea">
                <label for="exampleFormControlInput1" class="form-label" required>パスワード</label>
                <input type="password" class="form-control">
            </div>
            <div class="loginbtn d-grid ">
                <!-- <button type="submit" class="btn btn-primary btn-lg">ログイン</button> -->
                <input type="button" value="ログイン" class="button">
            </div>
        </form>
    </div>
</div>

<script src="sample.js"> </script>
</body>

</html>
<!-- @endsection -->