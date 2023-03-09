<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link href="/css/style_sayaka.css" rel="stylesheet">
    <title>Document</title>

    <!-- リアルタイムの時間を表示 -->
    <script type="text/javascript">

    document.addEventListener('DOMContentLoaded',function(){
      var date = new Date();

      var year_str = date.getFullYear();
      var month_str = date.getMonth()+1;
      var day_str = date.getDate();
      var hour_str = date.getHours();
      var minute_str = date.getMinutes();
      var second_str = date.getSeconds();

      month_str = ('0' + month_str).slice(-2);
      day_str = ('0' + day_str).slice(-2);
      hour_str = ('0' + hour_str).slice(-2);
      minute_str = ('0' + minute_str).slice(-2);
      second_str = ('0' + second_str).slice(-2);

      format_str = 'YYYY-MM-DD hh:mm:ss';
      format_str = format_str.replace(/YYYY/g, year_str);
      format_str = format_str.replace(/MM/g, month_str);
      format_str = format_str.replace(/DD/g, day_str);
      format_str = format_str.replace(/hh/g, hour_str);
      format_str = format_str.replace(/mm/g, minute_str);
      format_str = format_str.replace(/ss/g, second_str);

      target = document.getElementById("timeframe");
      target.innerHTML = format_str;
    });
    </script>

</head>
<body>
    @include('parts.nav')
    <div class="text-muted" style="padding: 10px 20px 5px 10px">最新の更新日時:<span id="timeframe"></span></div>
    <h1 class="text-muted text-center">team141</h1>
    <p class="text-muted text-center">{{Auth::user()->name}}さんようこそ！！</p>

    <ul class="slider">
        <li><img src="/img/book.jpg" class="rounded" alt=""></li> <!--クラスを追加することで画像の角を丸に-->
        <li><img src="/img/women.jpg" class="rounded" alt=""></li>
        <li><img src="/img/book2.jpg" class="rounded" alt=""></li>
        <li><img src="/img/cat2.jpg" class="rounded" alt=""></li>
        <li><img src="/img/kuma.jpg" class="rounded" alt=""></li>
        <li><img src="/img/nezumi.jpg" class="rounded" alt=""></li>
        <li><img src="/img/kuma2.jpg" class="rounded" alt=""></li>
        <li><img src="/img/zou.jpg" class="rounded" alt=""></li>
        <li><img src="/img/nezumi.jpg" class="rounded" alt=""></li>
    <!--/slider--></ul>

    <div class="p-5 waths-new">
    <p class="p-2 mb-2 bg-warning">新着一覧</p> 
    <table class="table table-condensed">
    <tr><th>新着日</th><th>カテゴリー</th><th>本のタイトル</th><th>在庫</th></tr>
    @foreach($items as $item)
    <tr><td class="text-muted">{{$item->created_at}}</td><td class="text-muted">{{$item->type}}</td><td class="text-muted">{{$item->name}}</td><td class="text-muted">{{$item->status}}</td></tr>
    @endforeach

    </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/slider.js"></script>

</body>
</html>