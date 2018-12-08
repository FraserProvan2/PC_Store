@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <!-- Top Categories 1 -->
    <div class="row gutters-3">
    <div class="col-6 d-flex">
        <div class="card card-2col flex-fill">
        <div class="d-flex flex-column-reverse flex-md-row">
            <div class="card-2col-body">
            <h2 class="card-title">Build a PC</h2>
            <p class="text-center d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum minima, magnam quam quisquam. Ipsum, provident.</p>
            <a href="/build" class="btn btn-primary rounded-pill" data-addclass-on-xs="btn-sm">Build Now</a>
            </div>
            <div class="card-2col-img">
            <div data-cover="../img/categories/men.jpg" data-xs-height="120px" data-sm-height="200px" data-md-height="175px" data-lg-height="225px" data-xl-height="250px"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-6 d-flex">
        <div class="card card-2col flex-fill">
        <div class="d-flex flex-column-reverse flex-md-row">
            <div class="card-2col-body">
            <h2 class="card-title">LAN Rental</h2>
            <p class="text-center d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum minima, magnam quam.</p>
            <a href="/lan-rental" class="btn btn-danger rounded-pill" data-addclass-on-xs="btn-sm">Rent Now</a>
            </div>
            <div class="card-2col-img">
            <div data-cover="../img/categories/women.jpg" data-xs-height="120px" data-sm-height="200px" data-md-height="175px" data-lg-height="225px" data-xl-height="250px"></div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- /Top Categories 1 -->

<br>

@endsection