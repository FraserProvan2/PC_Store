@extends('layouts.admin')

@section('title', 'Orders')

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        <h3>Orders ({{ $type }})</h3>


        <!-- START row-->
        <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Username</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>£{{ $order->price }}</td>
                                    <td>Username</td>
                                    <td><button type="button" class="btn btn-default">View</button></td>
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