@extends('layouts.admin')

@section('title', 'Orders')

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        
    <h3>Order #{{ $order_data->id }}</h3>
    <a href="{{ URL::previous() }}" class="btn btn-xs btn-primary"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Return to Orders</a> 

        <!-- START row-->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Cart</h4>
                        
                        @foreach($cart_data as $key=>$item)
                            <div class="mb-2 p">
                                @if($item->type == 'build')
                                    <a href="{{ url('build/view/' . $item->partlist_id) }}" target="_blank"> {{ $item->partlist_name }} </a>
                                @elseif($item->type == 'component')
                                    {{ $item->part_name }} 
                                @endif
                                -
                                <span class="bold text-primary">£{{ $item->price }}</span>
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

                        <h4 class=" bold">Total: <span class="text-primary">£{{ number_format($order_data->price, 2) }}</span></h4>


                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Shipping</h4>
                        {{ $shipping->first_name }} {{ $shipping->last_name }}<br>
                        {{ $shipping->email_address }}<br>
                        {{ $shipping->number }}<br>
                        {{ $shipping->address }}, {{ $shipping->postcode }}<br>
                        {{ $shipping->country }}, {{ $shipping->city }}<br><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        wef
                    </div>
                </div>
            </div>
        </div>

@endsection