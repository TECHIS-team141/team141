@extends('layouts.app')

@section('title', '登録画面')

@section('content')

<!-- ユーザー登録用ページ -->
<div class="panel-body container small text-center">
<!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <h1>会員登録</h1>
    <!-- 新ユーザー情報登録フォーム -->
    <form action = "{{url('userslists')}}" method = "POST" class="justify-content-sm-center">
        {{ csrf_field() }}
        <!-- ユーザー情報(名前) -->
        <div class="form-group row">
            <label for="user-name" class="col-sm-3 control-label"></label>     
            <div class="col-sm-6">
            <input type="text" name="name" id="user-name" class="form-control" placeholder="名前">
            </div>
        </div>

        <!-- ユーザー情報(電話番号) -->
        <div class="form-group row">
            <label for="phone" class="col-sm-3 control-label"></label>
            
            <div  class="col-sm-6">
                <input type="tel" name="phone" id="phonenumber" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" class="form-control" placeholder="電話番号（ハイフンあり）">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 control-label"></label>      
            <div class="col-sm-6">
            <input type="email" name="emaile" id="useremaile" class="form-control" placeholder="メールアドレス">
            </div>
        </div>

        <!-- ユーザー情報追加ボタン -->
        <div class="form-group row">
            <div class="offset-md-3 col-sm-6">
                <button type="submit" class="btn btn-default border border-dark">
                    <i class="fa fa-plus"></i> 登録
                </button>
            </div>
        </div>
    </form>
</div>
@endsection