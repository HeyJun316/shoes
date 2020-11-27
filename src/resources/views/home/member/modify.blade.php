@extends('layouts.l_temp')

@section('modifycss')
<link rel="stylesheet" href="{{ asset('css/modify.css') }}">
@endsection

@section('content')
<section class="resist">
  <div class="title">
    <h2>
      会員情報編集
    </h2>
  </div>
  <div class="r-container">
    @if($errors->any())
    <div style="color:red">
      @foreach($errors->all() as $error)
      {{$error}}
      @endforeach
    </div>
    @endif

    <div class="r-inner">
      <form action="{{route('allupload')}}" method="post">
        @csrf

        <dl>
          <!--氏名-->
          <div class="r-info">
            <dt class="r-dt"><label for="name">
                氏名
              </label>
            </dt>
            <dd>
              <input type="text" name="name" value="{{$user_info->name}}" placeholder="お名前" class="input">
            </dd>
          </div>

          <!--メールアドレス-->
          <div class="r-info">
            <dt class="r-dt">
              <label for="mail">
                メールアドレス
              </label>
            </dt>
            <dd><input type="text" name="email" value="{{$user_info->email}}" placeholder="メール" class="input"></dd>
          </div>

          <!--性別-->
          <div class="r-radio r-info">
            <div class="r-dt radio-dt">
              性別
            </div>
            <div class="radio-inner">
              <label for="man">{{$user_info->sex}}</label>
            </div>
          </div>

          <!--郵便局-->
          <div class="r-info">

            <dt class="r-dt"><label for="postal_code">郵便番号</label></dt>
            <dd><input type="text" name="postal_code" value="{{$user_info->postal_code}}" class="input"></dd>
          </div>

          <!--住所-->
          <div class="r-info">
            <dt class="r-dt"><label for="address">住所</label></dt>
            <dd><input type="text" name="address" value="{{$user_info->address}}" placeholder="住所" class="input"></dd>
          </div>

          <!--生年月日+jQuery-->
          <div class="r-info r-birth">
            <dt class="r-dt r-b">
              <label for="03" class="append">
                生年月日
              </label>
            </dt>
            <dd>
              {{$user_info->birthday}}
            </dd>
          </div>


          <!--パスワード-->
          <div class=" r-info">
            <dt class="r-dt"><label for="pass">パスワード</label></dt>
            <dd><a href="{{route('password_modify')}}" style="color:black;">パスワードは安全のため表示できません。<br>パスワードを変更する</a></dd>
          </div>
          <input type="hidden" name="jun" value="2">
          <input type="submit" name="btn" class="btn r-btn" value="変更を登録する">
      </form>
      </dl>
    </div>
  </div>
</section>
@endsection