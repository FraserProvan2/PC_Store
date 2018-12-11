<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<!-- List of Parts -->
<div class="row gutters-3 mt-3">
    <div class="col-12">
        <div class="card card-product card-product-list">
            <div class="card-body">

                <h3 class="bold ma">{{ $part_title }}</h3>

                <!--Part Table-->
                <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button class="btn btn-sm btn-outline-primary atc-demo">Add to Cart</button></td>
                        </tr>
                    </tbody>
                </table>
       
            </div>
        </div>
    </div>
</div>
    </div>
</div>
</div>
<!-- /List of Parts -->

@endsection
