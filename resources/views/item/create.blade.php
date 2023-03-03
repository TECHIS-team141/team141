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
  <h1>書籍登録</h1>
  <br>
  <form action="/item/register" method="post">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif    
    <div class="form-group">
      <label for="itemName">本のタイトル</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <br>
    <div class="form-group">
      <label for="kind">カテゴリー</label>
      <select name="type" class="form-control" required>
        <option value="" selected disablad></option>
        @foreach(\App\Models\Item::TYPES as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
        @endforeach
      </select>
    </div>
    <br>
    <div class="form-group">
      <label for="textArea">詳細</label>
      <textarea name="detail" class="form-control" rows="5" required></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">登録</button>
  </form>
  <br>
  <a href={{url('item')}} class="btn btn-primary">一覧に戻る</a>
</body>