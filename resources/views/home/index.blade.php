<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link href="/css/style_sayaka.css" rel="stylesheet">
    <title>Document</title>

</head>
<body>
    @include('parts.nav')
    <h1>team141</h1>
    <p class="text-muted text-center">"user_id"さんようこそ！！</p>

    <ul class="slider">
        <li><img src="/img/book.jpg" alt=""></li>
        <li><img src="/img/book2.jpg" alt=""></li>
        <li><img src="/img/kuma.jpg" alt=""></li>
        <li><img src="/img/nezumi.jpg" alt=""></li>
        <li><img src="/img/kuma2.jpg" alt=""></li>
        <li><img src="/img/nezumi.jpg" alt=""></li>
    <!--/slider--></ul>

    <div class="p-5">

    <table class="table table-condensed">
    <p class="bg-warning">新着一覧</p> 
    <tr><th>新着日</th><th>カテゴリー</th><th>本のタイトル</th></tr>
    <tr><td>created_at</td><td>type</td><td>name</td></tr>
    <tr><td>created_at</td><td>type</td><td>name</td></tr>
    <tr><td>created_at</td><td>type</td><td>name</td></tr>
    <tr><td>created_at</td><td>type</td><td>name</td></tr>
    <tr><td>created_at</td><td>type</td><td>name</td></tr>
    </table>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/slider.js"></script>

</body>
</html>