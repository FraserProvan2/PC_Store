<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- REQUIRED CSS: FONT, BOOTSTRAP, METISMENU, PERFECT-SCROLLBAR  -->
        <link rel="stylesheet" href="../dist/css/vendor.min.css">

        <!-- PLUGINS FOR CURRENT PAGE -->
        <link rel="stylesheet" href="../plugins/swiper/swiper.min.css">
        <link rel="stylesheet" href="../plugins/noty/noty.min.css">

        <!-- Mimity CSS  -->
        <link rel="stylesheet" href="../dist/css/style.min.css">

        <!-- Font Awesome 4  -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Custom Styles  -->
        <link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/build.css">

        <title>PC Store - @yield('title')</title>
    </head>

    <!--Header -->
    <header>
        <div class="container">
    
        <!-- Sidebar toggler -->
        <a class="nav-link nav-icon ml-ni nav-toggler mr-3 d-flex d-lg-none" href="#" data-toggle="modal" data-target="#menuModal"><i data-feather="menu"></i></a>
    
        <!-- Logo -->
        <a class="nav-link nav-logo" href="/"><img src="../img/logo.svg" alt="Mimity"> <strong>PC Store</strong></a>
    
        <!-- Main navigation -->
        <ul class="nav nav-main d-none d-lg-flex m-auto"> <!-- hidden on md -->
            <li class="nav-item"><a class="nav-link <?php if($page == "home"){ echo "active"; }?>" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link <?php if($page == "build"){ echo "active"; }?>" href="/build">Build a PC</a></li>
            <li class="nav-item"><a class="nav-link <?php if($page == "lan"){ echo "active"; }?>" href="/lan-rental">LAN Rental</a></li>
        </ul>
        <!-- /Main navigation -->
        <ul class="nav mr-auto mr-sm-0">
    
            <!-- My Account -->
            <li class="nav-item dropdown dropdown-hover dropdown-cart">
            <a class="nav-link nav-icon mr-nis dropdown-toggle forwardable ml-2" data-toggle="dropdown" href="cart.html" role="button" aria-haspopup="true" aria-expanded="false">
                <i data-feather="user"></i>
            </a>   
                <div class="dropdown-menu dropdown-menu-right">
                <a href="/" class="dropdown-item has-icon"><i data-feather="shopping-cart"></i>My Orders</a>
                {{-- <a href="account-wishlist.html" class="dropdown-item has-icon has-badge"><i data-feather="heart"></i>Wishlist <span class="badge rounded badge-primary">2</span></a> --}}
                <a href="/" class="dropdown-item has-icon"><i data-feather="settings"></i>My Account</a>
                <div class="dropdown-divider"></div>
                <a href="/" class="dropdown-item has-icon text-danger"><i data-feather="log-out"></i>Logout</a>
                </div>
            </li>
            <!-- /My Account -->
    
            <!-- Cart dropdown -->
            <li class="nav-item dropdown dropdown-hover dropdown-cart">
            <a class="nav-link nav-icon mr-nis dropdown-toggle forwardable ml-2" data-toggle="dropdown" href="cart.html" role="button" aria-haspopup="true" aria-expanded="false">
                <i data-feather="shopping-cart"></i>
                <span class="badge badge-primary">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                
                <div class="media">
                <a href="shop-single.html"><img src="../img/products/1_small.jpg" width="50" height="50" alt="Hanes Hooded Sweatshirt"></a>
                <div class="media-body">
                    <a href="shop-single.html" title="Hanes Hooded Sweatshirt">Hanes Hooded Sweatshirt</a>
                    <span class="qty">1</span> x <span class="price">$18.56</span>
                    <button type="button" class="close" aria-label="Close"><i data-feather="x-circle"></i></button>
                </div>
                </div>
                
                <div class="media">
                <a href="shop-single.html"><img src="../img/products/2_small.jpg" width="50" height="50" alt="The Flash Logo T-Shirt"></a>
                <div class="media-body">
                    <a href="shop-single.html" title="The Flash Logo T-Shirt">The Flash Logo T-Shirt</a>
                    <span class="qty">1</span> x <span class="price">$16.64</span>
                    <button type="button" class="close" aria-label="Close"><i data-feather="x-circle"></i></button>
                </div>
                </div>
                
                <div class="d-flex justify-content-between pb-3 pt-2">
                <span>Total</span>
                <strong>$135.40</strong>
                </div>
                <div class="d-flex justify-content-between pb-2">
                <div class="w-100 mr-1">
                    <a href="cart.html" class="btn btn-block rounded-pill btn-secondary">View Cart</a>
                </div>
                <div class="w-100 ml-1">
                    <a href="shipping.html" class="btn btn-block rounded-pill btn-primary">Checkout</a>
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
    <div class="container mt-3">

    <body>
        @yield('content')
    </body>

    </div>
    <!-- /Main Content -->

    <footer>
        <!-- Footer -->
        <div class="copyright">Fraser Provan 2019</div>
        <!-- /Footer -->

        <!--Menu Modal -->
        <div class="modal modal-left modal-menu" id="menuModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header shadow">
                <a class="h5 mb-0 d-flex align-items-center" href="index.html">
                <img src="../img/logo.svg" alt="Mimity" class="mr-3">
                <strong>PC Store</strong>
                </a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body shadow">
                <ul class="menu" id="menu">
                    <li class="no-sub"><a href="/"><i data-feather="home"></i> Home</a></li>
                    <li class="no-sub"><a href="/"><i class="fa fa-wrench side-m" aria-hidden="true"></i> Build a PC</a></li>
                    <li class="no-sub"><a href="/"><i class="fa fa-wrench side-m" aria-hidden="true"></i> LAN Rental</a></li>
                </ul>
            </div>
            </div>
        </div>
        </div>
        <!-- /Menu Modal -->

        <!-- REQUIRED JS  -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../plugins/feather-icons/feather.min.js"></script>
        <script src="../plugins/metismenu/metisMenu.min.js"></script>
        <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <!-- PLUGINS FOR CURRENT PAGE -->
        <script src="../plugins/swiper/swiper.min.js"></script>
        <script src="../plugins/noty/noty.min.js"></script>
        <script src="../plugins/jquery-countdown/jquery.countdown.min.js"></script>

        <!-- Mimity JS  -->
        <script src="../dist/js/script.min.js"></script>

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
</html>