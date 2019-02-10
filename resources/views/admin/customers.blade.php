@extends('layouts.admin')

@section('title', 'Customers')

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        <h3>Customers</h3>

        @include('layouts.admin-alerts')
        
        <!-- START row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Signed Up</th>
                                    <th>Admin</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>
                                            {{ $customer->name }}
                                        </td>
                                        <td>
                                            {{ $customer->email }}
                                        </td>
                                        <td>
                                            {{ $customer->created_at }}
                                        </td>
                                        @if($customer->is_admin == 1)
                                            <td class="success">
                                                Yes
                                            </td>
                                        @else
                                            <td>
                                                No
                                            </td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/admin/customers/' . $customer->id) }}" class="btn-sm btn-default">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $customers->links(); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   
@endsection