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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    @if($type == 'Active')
                                        <th>Status</th>
                                    @endif
                                    <th>Date/Time</th>
                                    <th>Total</th>
                                    <th>Name</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        @if($type == 'Active')
                                            <th>
                                                @if($order->status == 'in-progress')
                                                    <span class="text-primary">In Progress</span>
                                                @elseif($order->status == 'shipped')
                                                    <span class="text-primary">Shipped</span>
                                                @endif
                                            </th>
                                        @endif
                                        <td width="22.5%">{{ $order->created_at }}</td>
                                        <td>£{{ $order->price }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td><a href="{{ url('admin/orders/' . $order->id) }}" class="btn-sm btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </a></td>
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