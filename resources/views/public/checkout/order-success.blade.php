@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="card">
    <div class="card-body">
      <h2 class="bold text-center mb-4">Payment Success!</h2>
      <div class="row">
          <div class="col-md-12 text-center mb-2">
                <h5 class="bold">Cart Items</h5>

                @foreach($cart as $key=>$item)
                    <div class="mb-2 h6">
                        @if($item['type'] == 'build')
                            {{ $item['partlist_name'] }} 
                        @elseif($item['type'] == 'component')
                            {{ $item['part_name'] }} 
                        @endif
                        -
                        <span class="bold text-primary">£{{ $item['price'] }}</span>
                    </div>
                @endforeach

                <div class="mb-3 h5">
                    Shipping: 
                    @if($shipping->shipping_method == 'express')
                        <span class="bold text-primary">£25</span>
                    @else
                        FREE
                    @endif
                </div>

                <h4 class="mt-2 bold">Total: <span class="text-primary">£{{ number_format($order_data->price, 2) }}</span></h4>
          </div>
          <div class="col-md-12 text-center">
                <p>
                    <h5 class="bold">Card Used</h5>
                    <span>**** **** **** 
                        <span class="text-primary">{{ $card }}</span>
                    </span>
                    
                    <h5 class="bold mt-4">Shipping Address</h5>
                    {{ $shipping->first_name }} {{ $shipping->last_name }}<br>
                    {{ $shipping->email_address }}<br>
                    {{ $shipping->number }}<br>
                    {{ $shipping->address }}, {{ $shipping->postcode }}<br>
                    {{ $shipping->country }}, {{ $shipping->city }}<br><br>
                </p>
          </div>
      </div>
    </div>
  </div>

@endsection