@extends('layouts.master')

@section('title', 'Account - Orders')

@section('content')

<div class="row">

    <div class="col-md-4 col-lg-3">
        <div class="card">
        <div class="card-body text-center">
            <h5 class="bold mb-0">John Thor</h5>
            <small class="counter">Joined Dec 31, 2017</small>
        </div>
        <div class="list-group list-group-flush">
            <a href="/account" class="list-group-item list-group-item-action"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>
            <a href="/account/orders" class="list-group-item list-group-item-action active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag mr-3"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg> Orders</a>
            <a class="list-group-item list-group-item-action text-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i data-feather="log-out"></i>    
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Logout') }}
            </a>
        </div>
        </div>
    </div>

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
                        <tr>
                        <th scope="row"><a href="javascript:void(0)">ORD556789</a></th>
                        <td>Dec 19, 2017</td>
                        <td class="text-right">$74.00</td>
                        <td class="text-center"><span class="badge badge-warning rounded">In Progress</span></td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="javascript:void(0)">ORD456789</a></th>
                        <td>Dec 10, 2017</td>
                        <td class="text-right">$100.00</td>
                        <td class="text-center"><span class="badge badge-danger rounded">Canceled</span></td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="javascript:void(0)">ORD356789</a></th>
                        <td>Dec 01, 2017</td>
                        <td class="text-right">$20.00</td>
                        <td class="text-center"><span class="badge badge-success rounded">Finished</span></td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="javascript:void(0)">ORD256789</a></th>
                        <td>Nov 19, 2017</td>
                        <td class="text-right">$74.00</td>
                        <td class="text-center"><span class="badge badge-success rounded">Finished</span></td>
                        </tr>
                        <tr>
                        <th scope="row"><a href="javascript:void(0)">ORD156789</a></th>
                        <td>Nov 10, 2017</td>
                        <td class="text-right">$100.00</td>
                        <td class="text-center"><span class="badge badge-success rounded">Finished</span></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection