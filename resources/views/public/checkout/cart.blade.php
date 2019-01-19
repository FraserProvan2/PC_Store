@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="container my-3">
    <div class="card">

        <!--Progress links-->
        @include('layouts.checkout-progress', $page = ['cart'])

        <div class="card-body px-1 px-md-5 pt-5">
            <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
                <tbody>
                    
                <?php 
                    $cart_count = -1;
                    
                    //counts amount of cart items
                    $cart_items = Session::get('cart');
                ?>
                @if(isset($cart_items))
                    @foreach($cart_items as $item)
                            <?php $cart_count++ ?>
                            <tr>
                                <td class="cart-title">
                                    <a class="h6 bold d-inline-block">{{ $item['partlist_name'] }}</a>
                                <br>
                                    <span class="roboto-condensed bold">£{{ number_format($item['price'], 2) }}</span>
                                </td>

                                <td class="cart-price text-right">
                                    <a href="{{ url('cart/remove/' . $cart_count) }}" class="btn btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                    @endforeach
                @endif
                    
                </tbody>
            </table>
            <div class="text-center">
            <small class="counter">SUBTOTAL</small>
        
            <h3 class="roboto-condensed bold">£{{ number_format($cart_total, 2) }}</h3>
            
            <a href="{{ url('/shipping') }}" class="btn btn-primary btn-lg <?php if(empty(session::get('cart')) > 0) { echo "disabled"; } ?>">Shipping <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
            
            </div>
        </div>
    </div>
</div>

@endsection