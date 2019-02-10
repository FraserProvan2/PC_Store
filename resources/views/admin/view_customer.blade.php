@extends('layouts.admin')

@section('title', 'Customers')

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        
        <h3>{{ $customer->name }}</h3>
        
        @include('layouts.admin-alerts')
        <a href="{{ url('admin/customers') }}" class="btn btn-xs btn-primary"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Return to Customers</a> 
    
            <!-- START row-->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Details</h4>
                                    <p>Name: {{ $customer->name }}</p>
                                    <p>Email: {{ $customer->email }}</p>
                                    <p>Signed Up: {{ $customer->created_at }}</p>
                                    <p>Admin:
                                        @if($customer->is_admin == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Order History</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers_orders as $order)
                                        <tr>
                                            <td>#{{ $order->id }}</td>
                                            <td>£{{ $order->price }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ url('admin/orders/' . $order->id) }}" class="btn-sm btn-default" target="_blank">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $customers_orders->links(); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
    </div>

@endsection