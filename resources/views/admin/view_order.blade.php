@extends('layouts.admin')

@section('title', 'Orders')

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        
    <h3>Order #{{ $order_data->id }}</h3>
    @include('layouts.admin-alerts')
    <a href="{{ url('admin/orders') }}" class="btn btn-xs btn-primary"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Return to Orders</a> 

        <!-- START row-->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Cart</h4>
                        
                        @foreach($cart_data as $key=>$item)
                            <div class="mb-2 cart-items">
                                @if($item->type == 'build')
                                    <a href="{{ url('build/view/' . $item->partlist_id) }}" target="_blank"> {{ $item->partlist_name }} </a>
                                @elseif($item->type == 'component')
                                    {{ $item->part_name }} 
                                @endif
                                -
                                <span class="bold text-primary">£{{ $item->price }}</span>
                            </div>
                        @endforeach

                        <div class="mb-3 cart-items">
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
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">                         
                        <div class="row">
                            <div class="col-lg-5">
                                <h4>Status: 
                                    @if($order_data->status == 'in-progress')
                                        <span class="text-primary">In Progress</span>
                                    @elseif($order_data->status == 'shipped')
                                        <span class="text-primary">Shipped</span>
                                    @elseif($order_data->status == 'complete')
                                        <span class="text-success">Completed</span>
                                    @endif
                                </h4>
                            </div>
                            <div class="col-lg-7">

                                @if($order_data->status != 'complete')
                                    <a href="{{ url('admin/orders/edit/' . $order_data->id) }}" class="btn-sm btn-primary btn-block text-center status-btn">
                                        @if($order_data->status == 'in-progress')
                                            Mark Shipped
                                        @elseif($order_data->status == 'shipped')
                                            Mark Complete
                                        @endif
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection