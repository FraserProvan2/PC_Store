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
        <form class="form-checkout" action="{{ url('/shipping/address') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="shippingFirstName">First Name</label>
                    <input type="text" class="form-control" id="shippingFirstName" name="first_name" value="<?php if(isset($shipping_details['first_name'])){ echo $shipping_details['first_name']; } ?>" required>
                </div>
                <div class="form-group col-6">
                    <label for="shippingLastName">Last Name</label>
                    <input type="text" class="form-control" id="shippingLastName" name="last_name" value="<?php if(isset($shipping_details['last_name'])){ echo $shipping_details['last_name']; } ?>" required>
                </div>
                <div class="form-group col-6">
                    <label for="shippingEmail">Email Address</label>
                    <input type="email" class="form-control" id="shippingEmail" name="email_address" value="<?php if(isset($shipping_details['email_address'])){ echo $shipping_details['email_address']; } ?>" required>
                </div>
                <div class="form-group col-6">
                    <label for="shippingPhone">Phone Number</label>
                    <input type="tel" class="form-control" id="shippingPhone" name="number" value="<?php if(isset($shipping_details['number'])){ echo $shipping_details['number']; } ?>" required>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-12">
                    <label for="shippingAddress">Address</label>
                    <input type="text" class="form-control" id="shippingAddress" name="address" value="<?php if(isset($shipping_details['address'])){ echo $shipping_details['address']; } ?>" required>
                </div>
                <div class="form-group col-6 col-sm-5">
                    <label for="shippingCountry">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php if(isset($shipping_details['country'])){ echo $shipping_details['country']; } ?>" required>
                </div>
                <div class="form-group col-6 col-sm-4">
                    <label for="shippingCity">City</label>
                    <input type="text" class="form-control" id="shippingCity" name="city" value="<?php if(isset($shipping_details['city'])){ echo $shipping_details['city']; } ?>" required>
                </div>
                <div class="form-group col-3 col-sm-3">
                    <label for="shippingZip">Post Code</label>
                    <input type="text" class="form-control" id="shippingZip" name="postcode" value="<?php if(isset($shipping_details['postcode'])){ echo $shipping_details['postcode']; } ?>" format="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}" required>
                </div>
            </div>
            <hr>
            <div class="form-group text-center mt-3 shipping-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="shipping_method" value="standard" class="custom-control-input" <?php if(!isset($shipping_details) || $shipping_details['shipping_method'] == 'standard'){ echo "checked"; } ?>>
                <label class="custom-control-label text-left" for="customRadioInline1">
                Standard <span class="counter">(FREE)</span>
                <small class="counter d-block">10-15 Days</small>
                </label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="shipping_method" class="custom-control-input" value="express" <?php if($shipping_details['shipping_method'] == 'express'){ echo "checked"; } ?>>
                <label class="custom-control-label text-left" for="customRadioInline2">
                Express <span class="counter">(£25)</span>
                <small class="counter d-block">3-5 Days</small>
                </label>
            </div>
            </div>
            <hr>
        
        <div class="text-center">
            <small class="counter">TOTAL</small>
            <h3 class="roboto-condensed bold">£
                <span id="total">
                    @if(isset($cart_total))
                        {{number_format($cart_total, 2)}}
                    @else
                        0
                    @endif
                </span>
           </h3>
            
            <input type="submit" href="payment.html" class="btn btn-primary btn-lg" value="Payment"/>
        </div>
        </div>
    </form>
    </div>
</div>

@endsection