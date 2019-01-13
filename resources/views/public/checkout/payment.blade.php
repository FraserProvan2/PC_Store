@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="container my-3">
    <div class="card">
        <div class="card-header bg-white border-bottom flex-center p-0">

        <!--Progress links-->
        @include('layouts.checkout-progress', $page = ['payment'])    

        </div>
        <div class="card-body pt-4 flex-center flex-column">
        {{-- <h6 class="text-muted mb-4">or checkout with <a href="javascript:void(0)"><strong>PayPal</strong></a></h6> --}}
        <form class="form-checkout" id="form-payment" action="/payment/proceed" method="POST">
            @csrf
            <div class='card-wrapper mb-3'></div>
                <div class="form-group">
                    <input type="text" name="number" class="form-control" placeholder="Card Number" required>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="text" name="expiry" class="form-control" placeholder="Expiry Date" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" name="cvc" class="form-control" placeholder="CVC Code" required>
                    </div>
                </div>
        <div class="text-center">
            <small class="counter">TOTAL</small>

            <?php 
                $cart = Session::get('cart'); 

                $cart_total = 0;
                foreach($cart as $item){
                    $cart_total += $item['price'];
                }

                $shipping_details = session::get('shipping_details');
                if($shipping_details['shipping_method'] == 'express'){
                    $cart_total += 25;
                }

                if(!$cart){
                    $cart = [0];
                }
            ?>

            <h3 class="roboto-condensed bold">£{{ number_format($cart_total) }}</h3>
            <input type="submit" class="btn btn-primary btn-lg" value="Pay Now">
            </form>
        </div>
        </div>
    </div>
</div>

@endsection