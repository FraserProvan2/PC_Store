@extends('layouts.master')

@section('title', 'Account - Orders')

@section('content')

<div class="row">

    <?php $sidebar_page = "orders"; ?>
    @include('layouts.account-sidebar')

    <div class="col mt-3 mt-md-0">
        <div class="card">
            <div class="card-body">
                <h3>My Orders</h3><hr>
                <div class="table-responsive">
                    <table class="table table-hover" data-addclass-on-xs="table-sm">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-right">Total</th>
                        <th scope="col" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row"><a href="{{ url('account/order/' . $order->id) }}">#{{ $order->id }}</a></th>
                                <td>{{ $order->created_at }}</td>
                                <td class="text-right">£{{ number_format($order->price, 2) }}</td>
                                <td class="text-center">
                                    @if($order->status == 'in-progress')
                                        <span class="badge badge-warning rounded">In Progress</span>
                                    @elseif($order->status == 'shipped')
                                        <span class="badge badge-warning rounded">Shipped</span>
                                    @elseif($order->status == 'complete')
                                        <span class="badge badge-success rounded">Complete</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection