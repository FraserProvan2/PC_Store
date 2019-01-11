@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="card">
        <div class="card-header bg-white border-bottom flex-center p-0">
          <ul class="nav nav-pills card-header-pills main-nav-pills" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="cart.html">CART</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shipping.html">SHIPPING</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payment.html">PAYMENT</a>
            </li>
          </ul>
        </div>
        <div class="card-body px-1 px-md-5 pt-5">
          <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
            <tbody>
              
            <?php 
                //defines cart total
                $cart_total = 0;   

                //counts amount of cart items
                $cart_items = Session::get('cart');

                //cart counter
                $cart_count = 0-1;
            ?>
            @if(isset($cart_items))
                @foreach($cart_items as $item)
                        <?php 
                            //Increase cart count
                            $cart_count++;

                            //adds cart item price to total
                            $cart_total += $item['price'];
                        ?>

                        <tr>
                            <td class="cart-title">
                                <a href="shop-single.html" class="h6 bold d-inline-block" title="Hanes Hooded Sweatshirt">{{ $item['partlist_name'] }}</a>
                            <br>
                                <span class="roboto-condensed bold">£{{ number_format($item['price']) }}</span>
                            </td>

                            <td class="cart-price text-right">
                                <a href="" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> View </a>
                                <a href="{{ url('cart/remove/' . $cart_count) }}" class="btn btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>

                        </tr>
                @endforeach
            @endif
              
            </tbody>
          </table>
          <div class="text-center">
            <small class="counter">SUBTOTAL</small>
            <h3 class="roboto-condensed bold">${{ number_format($cart_total) }}</h3>
            <a href="{{ url('shipping') }}" class="btn btn-primary btn-lg">Shipping <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
          </div>
        </div>
      </div>

@endsection