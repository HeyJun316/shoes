@extends('layouts.l_temp')

@section('product_listcss')
<link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
@endsection

@section('content')
<section class="side-main">
  <div class="s-container">

    <div class="category">
      <h2 class="s-head">探す</h2>
      <ul class="s-search">
        @foreach($categories as $category)
        <li><a href="{{route ('product_list', ['id' => $category->id]) }}">
            {{$category->name_jp}}
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="category div_price">
      <h2 class="s-head ">価格検索</h2>
      <ul class="s-search">
        <li class="category_nav">
          <a href="{{ route('cheap') }}">
            価格が安い順番
          </a>
        </li>
        <li class="category_nav">
          <a href="{{ route('pricy') }}" class="category">
            価格が高い順番

          </a>
        </li>
      </ul>
    </div>
    <!--cate-->
    <div class="ser-box">
      <h2 class="s-head">検索</h2>
      <form action="{{ route('search')}}" method="get" class="form">
        @csrf
        <input type="serach" name="product_name" placeholder="キーワード" class="search_input">
        <input type="submit" value="検索" class="search_btn">
      </form>
    </div>
    <!--d-box-->
    <!--d-box-->
  </div>
  <!--s-container-->
  <div class="m-container">
    @if(isset($name))
    <h2 class="s-head"><a href="{{ route('top') }}">Home</a> ≫ {{$name}}</h2>
    @else
    <h2 class="s-head"><a href="{{ route('top') }}">Home</a> ≫ 最新</h2>
    @endif
    <div class="items">
      @foreach($products as $product)
      <div class="item">
        <a class="product" href="{{ route('single_product',['id' => $product->id] ) }}">
          <div class="p-img">
            <img alt="文字表示" src="{{ asset($product->image) }}">


          </div>
          <div class="p-body">
            <div class="p-title">{{$product->product_name}}</div>
          </div>
          <div class="p-price">{{$product->price}}円</div>
        </a>
        <!--product-->
      </div>
      <!--item-->
      @endforeach

    </div>
    <!--items-->
    <div class="more">

      {{$products->links()}}

    </div>
  </div>
  <!--m-container-->

</section>
@endsection