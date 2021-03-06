@extends('layouts.l_temp')

@section('payment_conf')
<link rel="stylesheet" href="{{ asset('css/payment_conf.css') }}">
@endsection

@section('content')

<section class="payment">
  <div class="title">
    <h2>決済</h2>
  </div>
  <div class="p-inner">

    <div class="l-pay">
      <div class="l-product">
        <div class="sub-title">
          <h2>商品</h2>
        </div>
        <table class="p-table">
          <tr>
            <th>商品名</th>
            <th>値段</th>
            <th>サイズ</th>
            <th>数量</th>
            <td>-</td>
          </tr>

          @foreach($carts as $cart)
          <tr>
            <td class="p-prod top">
              <p>{{$cart->product->product_name}}</p>
            </td>
            <td>{{$cart->product->price}}円</td>
            <td>{{$cart->size->size}}</td>
            <td>1</td>
            <td>
              <a href="{{route('cart')}}">
                <input href="{{route('cart')}}" style="color:black;" type="submit" value="変更">
                <!--直前の数量を反映する-->
              </a>
            </td>
            <!--直前の数量を反映する-->
          </tr>
          @endforeach
        </table>
      </div>
      <!--l-product-->

      <div class="l-address">
        <div class="sub-title">
          <h2>配送住所</h2>
        </div>
        <table class="a-table">

          @foreach($users as $user)
          <tr>
            <th class="noborder">名前</th>
            <td>{{$user->name}}</td>
            <td rowspan="3" style="text-align:center;">
              <a href="{{route('ship_modify')}}">
                <input href="{{route('ship_modify')}}" style="color:black;" type="submit" value="変更">
              </a>
            </td>
          </tr>
          <tr>
            <th class="none" style="border-right:none;">郵便番号</th>
            @if($user['postal_code'] == null)
            <td style="color:red;font-weight:bold;">入力してください</td>
            @else
            <td>{{$user->postal_code}}</td>
            @endif
          </tr>
          <tr>
            <th class=" none">住所</th>
            @if($user['address'] == null)
            <td style="color:red; font-weight:bold;">入力してください</td>
            @else
            <td>{{$user->address}}</td>
            @endif
          </tr>
          @endforeach
        </table>
      </div>
      <!--l-address-->
      <div class="l-way">
        <div class="sub-title">
          <h2>決算方法</h2>
        </div>
        <div class="w-pay">
          <input type="radio" name="card" value="card" checked>クレジットカード
          </form>
        </div>

        <!--w-pay-->
      </div>
      <!--l-way-->
    </div>
    <!--l-pay-->


    <div class="r-pay">
      <div class="r-decision">
        <div class="total-p">
          <span style="font-weight:bold;" class="span">
            合計金額
          </span>
          <br>{{number_format($sum)}}円
        </div>

        <div class="content">
          @if($users[0]['address'] === null)
          <h2 style="color:red;font-weight:bold;">配送住所を入力してください</h2>
          @elseif($users[0]['postal_code'] == null)
          <h2 style="color:red;font-weight:bold;">配送住所を入力してください</h2>
          @else
          <form action="{{ asset('charge') }}" method="post" class="kessan">
            @csrf
            {{ csrf_field() }}

            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51Hex2hJWvOOGSfsbU0ArdQlYHyNLmfPxyUxtsIEVT0crrQfwQ082QC6lc6GgM3R6kqhkJjfSLmT5RHbjMiLCpa4P00Fo3GNEkV" data-amount=" {{$sum}} " data-name="Stripe Demo" data-label="決済をする" data-description="Online course about integrating Stripe" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
            </script>
          </form>
          @endif
        </div>

      </div>
    </div>
    <!--r-pay-->
  </div>
  <!--p-inner-->
</section>

</section>


@endsection