@extends('layouts.master')

@section('title', 'Home')

@section('content')

<h2 class="bold text-center mb-4">Payment Success! <i class="fa fa-check text-primary" aria-hidden="true"></i></h2>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bold h4">Cart Items</div>
            <div class="card-body">
                
                @foreach($cart as $key=>$item)
                    <div class="mb-2 p">
                        @if($item['type'] == 'build')
                            <a href="{{ url('build/view/' . $item['partlist_id']) }}" target="blank"> {{ $item['partlist_name'] }} </a>
                        @elseif($item['type'] == 'component')
                            {{ $item['part_name'] }} 
                        @endif
                        -
                        <span class="bold text-primary">£{{ $item['price'] }}</span>
                    </div>
                @endforeach

                <div class="mb-3 p">
                    Shipping: 
                    @if($shipping->shipping_method == 'express')
                        <span class="bold text-primary">£25</span>
                    @else
                        FREE
                    @endif
                </div>

                <hr>

                <h4 class="mt-2 bold">Total: <span class="text-primary">£{{ number_format($order_data->price, 2) }}</span></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bold h4">Order Details</div>
            <div class="card-body">
                    Card Used: 
                    <span>**** **** **** 
                        <span class="text-primary">{{ $card }}</span>
                    </span>
                    
                    <h5 class="bold mt-4">Shipping Address</h5>
                    {{ $shipping->first_name }} {{ $shipping->last_name }}<br>
                    {{ $shipping->email_address }}<br>
                    {{ $shipping->number }}<br>
                    {{ $shipping->address }}, {{ $shipping->postcode }}<br>
                    {{ $shipping->country }}, {{ $shipping->city }}<br><br>
            </div>
        </div>
    </div>
</div>

@endsection