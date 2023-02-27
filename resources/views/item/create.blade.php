<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="signup text-center">
  <br>
  <h1>商品登録</h1>
  <br>
  <form action="/item/register" method="post">
    @csrf
    <div class="form-group">
      <label for="itemName">商品名</label>
      <input type="text" name="name" class="form-control">
    </div>
    <br>
    <div class="form-group">
      <label for="kind">種別</label>
      <select name="type" class="form-control">
        <option value="" selected disablad></option>
        @foreach(\App\Models\Item::TYPES as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
        @endforeach
      </select>
    </div>
    <br>
    <div class="form-group">
      <label for="textArea">詳細</label>
      <textarea name="detail" class="form-control" rows="5"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">登録</button>
  </form>
</body>