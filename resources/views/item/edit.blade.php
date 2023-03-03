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
  <h1 class="text-center">書籍編集</h1>
  <h3 class="text-center">ID : {{$item->id}}</h3>
  <br>
  <form class="text-center" action="/item/update" method="post">
    @csrf
    <div class="form-group">
      <label for="itemName">本のタイトル</label>
      <input type="text" name="name" class="form-control" value="{{$item->name}}">
    </div>
    <br>
    <div class="form-group">
      <label for="stock">在庫</label>
      <select name="status" class="form-control">
      @foreach(\App\Models\Item::STOCK as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
      @endforeach
      </select>
    </div>
    <br>
    <div class="form-group">
      <label for="kind">カテゴリー</label>
      <select name="type" class="form-control">
      @foreach(\App\Models\Item::TYPES as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
      @endforeach
      </select>
    </div>
    <br>
    <div class="form-group">
      <label for="textArea">詳細</label>
      <textarea name="detail" class="form-control" rows="5">{{$item->detail}}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">更新</button>
    <input type="hidden" name="id" value={{$item->id}}>
  </form>
  <br>
  <form class="text-center" action="/item/delete" method="get">
    @csrf
    <button type="submit" class="btn btn-secondary" onclick='return confirm("削除しますか？");'>削除</button>
    <input type="hidden" name="id" value={{$item->id}}>
  </form>
  <br>
  <div class="text-end">
    <a href={{url('item')}} class="btn btn-primary">一覧に戻る</a>
  </div>
</body>