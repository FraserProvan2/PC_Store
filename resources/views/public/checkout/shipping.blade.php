@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="container my-3">
    <div class="card">
        <div class="card-header bg-white border-bottom flex-center p-0">

        <!--Progress links-->
        @include('layouts.checkout-progress', $page = ['shipping'])

        </div>
        <div class="card-body pt-5 flex-center flex-column">
        <form class="form-checkout">
            <div class="form-row">
            <div class="form-group col-6">
                <label for="shippingFirstName">First Name</label>
                <input type="text" class="form-control" id="shippingFirstName" value="">
            </div>
            <div class="form-group col-6">
                <label for="shippingLastName">Last Name</label>
                <input type="text" class="form-control" id="shippingLastName" value="">
            </div>
            <div class="form-group col-6">
                <label for="shippingEmail">Email Address</label>
                <input type="email" class="form-control" id="shippingEmail" value="">
            </div>
            <div class="form-group col-6">
                <label for="shippingPhone">Phone Number</label>
                <input type="tel" class="form-control" id="shippingPhone" value="">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-12">
                <label for="shippingAddress">Address</label>
                <input type="text" class="form-control" id="shippingAddress" value="">
            </div>
            <div class="form-group col-6 col-sm-5">
                <label for="shippingCountry">Country</label>
                <input type="text" class="form-control" id="country" value="">
            </div>
            <div class="form-group col-6 col-sm-4">
                <label for="shippingCity">City</label>
                <input type="text" class="form-control" id="shippingCity" value="">
            </div>
            <div class="form-group col-3 col-sm-3">
                <label for="shippingZip">ZIP Code</label>
                <input type="text" class="form-control" id="shippingZip" value="">
            </div>
            </div>
            <hr>
            <div class="form-group text-center mt-3 shipping-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label text-left" for="customRadioInline1">
                Standard <span class="counter">(FREE)</span>
                <small class="counter d-block">10-15 Days</small>
                </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" checked>
                <label class="custom-control-label text-left" for="customRadioInline2">
                Express <span class="counter">($10)</span>
                <small class="counter d-block">1-3 Days</small>
                </label>
            </div>
            </div>
            <hr>
        </form>
        <div class="text-center">
            <small class="counter">TOTAL</small>
            <h3 class="roboto-condensed bold">$130.00</h3>
            <a href="payment.html" class="btn btn-primary btn-lg">Payment <i data-feather="arrow-right"></i></a>
        </div>
        </div>
    </div>
</div>

@endsection