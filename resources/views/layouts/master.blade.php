<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- REQUIRED CSS: FONT, BOOTSTRAP, METISMENU, PERFECT-SCROLLBAR  -->
        <link rel="stylesheet" href="{{ asset('/dist/css/vendor.min.css') }}">

        <!-- PLUGINS FOR CURRENT PAGE -->
        <link rel="stylesheet" href="{{ asset('/plugins/swiper/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/plugins/noty/noty.min.css') }}">

        <!-- Mimity CSS  -->
        <link rel="stylesheet" href="{{ asset('/dist/css/style.min.css') }}">

        <!-- Font Awesome 4  -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Custom Styles  -->
        <link rel="stylesheet" href="{{ asset('/css/build.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/component.css') }}">

        <title>PC Store - @yield('title')</title>
    </head>
    <body>
        <!--Header -->
        <header>
            <div class="container">
        
                <!-- Sidebar toggler -->
                <a class="nav-link nav-icon ml-ni nav-toggler mr-3 d-flex d-lg-none" href="#" data-toggle="modal" data-target="#menuModal"><i data-feather="menu"></i></a>
            
                <!-- Logo -->
                <a class="nav-link nav-logo" href="{{ url('/') }}"><img src="{{ asset('/img/logo.svg') }}" alt="Mimity"> <strong>PC Store</strong></a>
            
                <!-- Main navigation -->
                <ul class="nav nav-main d-none d-lg-flex m-auto"> <!-- hidden on md -->
                    
                    <?php if(empty($page)){ $page = ""; } ?>
                    @if(Auth::user() && Auth::user()->is_admin == 1)
                        <li class="nav-item"><a class="nav-link text-primary" href="{{ url('admin') }}">Admin</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link <?php if($page == "home"){ echo "active"; }?>" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($page == "build"){ echo "active"; }?>" href="{{ url('build') }}">Build a PC</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($page == "component"){ echo "active"; }?>" href="{{ url('components') }}">Components</a></li>
                </ul>
                <!-- /Main navigation -->
                <ul class="nav ml-auto mr-auto mr-sm-0 ml-sm-0">

                    <li class="nav-item dropdown dropdown-hover dropdown-cart">
                    <a class="nav-link nav-icon mr-nis dropdown-toggle forwardable ml-2" data-toggle="dropdown" href="{{ url('account') }}" role="button" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="user"></i>
                    </a>   
                        <div class="dropdown-menu dropdown-menu-right">
                            
                                @if(Auth::check())
                                    <!-- My Account -->
                                    <a href="{{ url('account/orders') }}" class="dropdown-item has-icon"><i data-feather="shopping-cart"></i>My Orders</a>
                                    <a href="{{ url('account') }}" class="dropdown-item has-icon"><i data-feather="settings"></i>My Account</a>
                                    <div class="dropdown-divider"></div>

                                    <!-- Log Out -->
                                    <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                @else
                                    <a href="{{ url('login') }}" class="dropdown-item has-icon"><i data-feather="user"></i>Login</a>
                                    <a href="{{ url('register') }}" class="dropdown-item has-icon"><i data-feather="user"></i>Register</a>
                                @endif

                        </div>
                    </li>
                    <!-- /My Account -->
            
                    <!-- Cart dropdown -->
                    <li class="nav-item dropdown dropdown-hover dropdown-cart">
                    <a class="nav-link nav-icon mr-nis dropdown-toggle forwardable ml-2" data-toggle="dropdown" href="{{ url('cart/view') }}" role="button" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="shopping-cart"></i>

                        <?php
                            //counts amount of cart items
                            $cart_items = Session::get('cart');
                        ?>
                        
                        @if(isset($cart_items))
                            @if(count($cart_items) > 0)
                                <span class="badge badge-primary">{{ count($cart_items) }}</span>
                            @endif
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

                        <?php 
                            //defines cart total
                            $cart_total = 0; 
                            
                            //cart counter
                            $cart_count = -1;
                        ?>
                    @if(isset($cart_items))
                        @foreach($cart_items as $item)
                            <?php
                                //Increase cart count
                                $cart_count++;
                            ?>

                            <div class="media">
                                <div class="media-body">

                                    @if($item['type'] == 'build')
                                        <a>{{ $item['partlist_name'] }}</a>
                                    @else
                                        <a>{{ $item['part_name'] }}</a>
                                    @endif

                                    
                                    <span class="price" style="margin:0px;">£{{ number_format($item['price'], 2) }}</span>
                                    <a href="{{ url('cart/remove/' . $cart_count) }}" class="close" aria-label="Close"><i data-feather="x-circle"></i></a>
                                </div>
                            </div>

                            <?php 
                                //adds cart item price to total
                                $cart_total += $item['price'];
                            ?>
                    
                            @endforeach
                        @endif

                        <div class="d-flex justify-content-between pb-3 pt-2">
                        <span>Total</span>
                        <strong>£{{ number_format($cart_total, 2) }}</strong>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                        <div class="w-100 ml-1">
                            <a href="{{ url('cart/view') }}" class="btn btn-block btn-primary">Cart / Pay</a>
                        </div>
                        </div>
                    
                    </div>
                    </li>
                    <!-- /Cart dropdown -->
                </ul>
        
            </div><!-- /.container -->
        </header>
        <!-- /Header -->

        <!-- Main Content -->
        <div class="container <?php echo ($page != "home") ? 'mt-3' : '' ?>">
            @yield('content')
        </div>
        <!-- /Main Content -->
        
        <footer class="mt-3 mb-3">
            <!-- Footer -->
            <div class="text-center">Fraser Provan 2019 - <a href="{{ url('https://github.com/FraserProvan2/PC_Store#readme') }}" target="_blank">About This Project</a></div>        
            <!-- /Footer -->

            <!--Menu Modal -->
            <div class="modal modal-left modal-menu" id="menuModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header shadow">
                    <a class="h5 mb-0 d-flex align-items-center">
                    <img src="{{ asset('/img/logo.svg') }}" class="mr-3">
                    <strong>PC Store</strong>
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body shadow">
                    <ul class="menu" id="menu">
                        
                        <li class="no-sub"><a href="{{ url('/') }}"><i data-feather="home"></i> Home</a></li>
                        <li class="no-sub"><a href="{{ url('/build') }}"><i class="fa fa-wrench side-m" aria-hidden="true"></i> Build a PC</a></li>
                        <li class="no-sub"><a href="{{ url('/components') }}"><i class="fa fa-hdd-o side-m" aria-hidden="true"></i> Components</a></li>
                        <li class="no-sub"><a href="{{ url('cart/view') }}"><i data-feather="shopping-cart"></i> Cart / Pay</a></li>
                        
                        <hr>

                        @if(Auth::user())
                            <li class="no-sub"><a href="{{ url('account') }}"><i data-feather="user"></i> My Account</a></li>
                            <li class="dropdown-item has-icon text-danger" href="{{ url('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                Logout
                            </li>

                            @if(Auth::user()->is_admin == 1)
                                <hr>
                                <li class="no-sub"><a class="nav-link text-primary" href="{{ url('admin') }}"><i data-feather="user"></i> Admin</a></li>
                            @endif
                        @else
                            <li class="no-sub"><a href="{{ url('login') }}"><i data-feather="user"></i> Sign In</a></li>
                            <li class="no-sub"><a href="{{ url('register') }}"><i data-feather="user"></i> Register</a></li>
                        @endif          

                    </ul>
                </div>
                </div> 
            </div>
            </div>
            <!-- /Menu Modal -->

            <!-- REQUIRED JS  -->
            <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('/plugins/feather-icons/feather.min.js') }}"></script>
            <script src="{{ asset('/plugins/metismenu/metisMenu.min.js') }}"></script>
            <script src="{{ asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

            <script src="{{ asset('/plugins/swiper/swiper.min.js') }}"></script>
            <script src="{{ asset('/plugins/noty/noty.min.js') }}"></script>
            <script src="{{ asset('/plugins/jquery-countdown/jquery.countdown.min.js') }}"></script>
            <script src="{{ asset('plugins/card/jquery.card.min.js') }}"></script>
            <script src="{{ asset('/dist/js/script.min.js') }}"></script>

            <script src="{{ asset('/js/custom.js') }}"></script>

            <script>
            $(function () {
                App.atcDemo() // Add to Cart Demo
                App.atwDemo() // Add to Wishlist Demo
                App.homeSlider('#home-slider')
                App.dealsSlider('#deals-slider')
                App.colorOption()

                // example countdown, 6 hours from now for flash deals
                var countdown = new Date()
                countdown.setHours(countdown.getHours() + 6)
                $('#flash-deals-countdown').countdown(countdown, function (event) {
                    $(this).text(event.strftime('%H:%M:%S'))
                })
            })
                
            </script>
        </footer>
    </body>
</html>