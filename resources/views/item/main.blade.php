<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <br>
  <h1 class="text-center">商品一覧</h1>
  <br>
  <a href={{url('item/create')}} class="btn btn-primary">商品登録</a>
  <br>
  <br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">名前</th>
        <th class="text-center">在庫</th>
        <th class="text-center">種別</th>
        <th class="text-center">詳細</th>
        <th></th>
      </tr>
    </thead>
    @foreach($items as $item)
    <tbody>
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{\App\Models\Item::STOCK[$item->status]}}</td>
        <td>{{\App\Models\Item::TYPES[$item->type]}}</td>
        <td>{{$item->detail}}</td>
        <td><a href="{{url('/item/edit/'.$item->id)}}">編集</a></td>
      </tr>
    @endforeach
   </table>