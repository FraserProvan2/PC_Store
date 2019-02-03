@extends('layouts.admin')

@section('title', 'Orders')

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        <h3>Orders</h3>

        <div class="row">
            <div class="col-lg-6 col-md-6">
            <a href="{{ url('admin/orders') }}">
                <!-- START panel-->
            <div class="panel panel-primary">

                <a href="{{ url('admin/orders') }}" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Active Orders</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
                <!-- END panel-->
            </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
            <!-- START panel-->
            <a href="{{ url('admin/orders/completed') }}">
            <div class="panel panel-green active">
                <a href="{{ url('admin/orders/completed') }}" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Completed Orders</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
                </a>
            <!-- END panel-->
            </div>
        </div>

        <!-- START row-->
        <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Active Orders</div>
                <div class="panel-body">
                    <div class="">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>#{{ $order->created_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>£{{ $order->price }}</td>
                                    <td  width="10%"><button type="button" class=" btn btn-primary">View</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                        </table>
                        <div class="text-center">
                        {!! $orders->links(); !!}
                    </div>
                    </div>  
                </div>
            </div>
            </div>
        </div>
        <!-- END row-->
    </div>

@endsection