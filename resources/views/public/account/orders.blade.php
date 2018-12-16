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