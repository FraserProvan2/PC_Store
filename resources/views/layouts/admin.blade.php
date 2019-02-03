<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
   <!-- Meta-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>Admin - @yield('title')</title>
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
   <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="{{ asset('admin_site/app/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('admin_site/vendor/font-awesome/css/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('admin_site/vendor/animo.js/animate-animo.css') }}">
   <link rel="stylesheet" href="{{ asset('admin_site/vendor/whirl/dist/whirl.css') }}">
   <link rel="stylesheet" href="{{ asset('admin_site/app/css/app.css') }}">
   <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
   <script src="{{ asset('admin_site/vendor/modernizr/modernizr.custom.js') }}" type="application/javascript"></script>
   <script src="{{ asset('admin_site/vendor/fastclick/lib/fastclick.js') }}" type="application/javascript"></script>
</head>

<body>
   <!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="{{ url('admin') }}" class="navbar-brand">
               <div class="brand-logo pull-left admin-logo" >
                  {{-- <img src="{{ asset('admin_site/app/img/logo.png') }}" alt="App Logo" class="img-responsive"> --}}
                  <img src="{{ asset('/img/logo.svg') }}"> <strong>PC Store</strong>
               </div>
               <div class="brand-logo-collapsed admin-logo-responsive">
                  {{-- <img src="{{ asset('admin_site/app/img/logo-single.png') }}" alt="App Logo" class="img-responsive"> --}}
                  <img src="{{ asset('/img/logo.svg') }}">
               </div>
            </a>
         </div>
         <!-- END navbar header-->
         <!-- START Nav wrapper-->
         <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
               <li>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
               </li>

               <!-- START User avatar toggle-->
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-user">
                     <em class="fa fa-user"></em>
                     &nbsp;Fraser
                  </a>
               </li>
               <!-- END User avatar toggle-->
            </ul>
            <!-- END Left navbar-->
         </div>
         <!-- END Nav wrapper-->
      </nav>
      <!-- END Top Navbar-->
      <!-- START aside-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <nav class="sidebar">
            <ul class="nav">

                <li>
                    <a href="{{ url('/admin') }}" title="Widgets" data-toggle="" class="no-submenu">
                        <em class="fa fa-home"></em>
                        <span class="item-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/customers') }}" title="Widgets" data-toggle="" class="no-submenu">
                        <em class="fa fa-users"></em>
                        <span class="item-text">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/orders') }}" title="Widgets" data-toggle="" class="no-submenu">
                        <em class="fa fa-truck"></em>
                        <span class="item-text">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/inventory') }}" title="Widgets" data-toggle="" class="no-submenu">
                        <em class="fa fa-list"></em>
                        <span class="item-text">Inventory</span>
                    </a>
                </li>

            </ul>
         </nav>
         <!-- END Sidebar (left)-->
      </aside>
      <!-- End aside-->
      <!-- START Main section-->
      <section>
         <!-- START Page content-->
 
         @yield('content')

         <!-- END Page content-->
      </section>
      <!-- END Main section-->
   </div>
   <!-- END Main wrapper-->
   <!-- START Scripts-->
   <!-- Main vendor Scripts-->
   <script src="{{ asset('admin_site/vendor/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
   <!-- Plugins-->
   <script src="{{ asset('admin_site/vendor/chosen/chosen.jquery.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/bootstrap-filestyle/src/bootstrap-filestyle.min.js') }}"></script>
   <!-- Animo-->
   <script src="{{ asset('admin_site/vendor/animo.js/animo.min.js') }}"></script>
   <!-- Sparklines-->
   <script src="{{ asset('admin_site/vendor/sparkline/index.js') }}"></script>
   <!-- Slimscroll-->
   <script src="{{ asset('admin_site/vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
   <!-- Store + JSON-->
   <script src="{{ asset('admin_site/vendor/store-js/store%2Bjson2.min.js') }}"></script>
   <!-- ScreenFull-->
   <script src="{{ asset('admin_site/vendor/screenfull/dist/screenfull.min.js') }}"></script>
   <!-- START Page Custom Script-->
   <!--  Flot Charts-->
   <script src="{{ asset('admin_site/vendor/flot/jquery.flot.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/flot.tooltip/js/jquery.flot.tooltip.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/flot/jquery.flot.resize.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/flot/jquery.flot.pie.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/flot/jquery.flot.time.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/flot/jquery.flot.categories') }}.js"></script>
   <script src="{{ asset('admin_site/vendor/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
   <!-- jVector Maps-->
   <script src="{{ asset('admin_site/vendor/ika.jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/ika.jvectormap/jquery-jvectormap-us-mill-en.js') }}"></script>
   <script src="{{ asset('admin_site/vendor/ika.jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
   <!-- END Page Custom Script-->
   <!-- App Main-->
   <script src="{{ asset('admin_site/app/js/app.js') }}"></script>
   <!-- END Scripts-->
</body>

</html>