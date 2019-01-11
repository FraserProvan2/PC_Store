<?php $page = $page[0]; ?>

<div class="card-header bg-white border-bottom flex-center p-0">
    <ul class="nav nav-pills card-header-pills main-nav-pills" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?php if($page == 'cart'){ echo "active"; } ?>" href="{{ url('cart/view') }}">CART</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page == 'shipping'){ echo "active"; } ?>"  href="{{ url('shipping') }}">SHIPPING</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page == 'payment'){ echo "active"; } ?>" href="{{ url('payment') }}">PAYMENT</a>
        </li>
    </ul>
</div>