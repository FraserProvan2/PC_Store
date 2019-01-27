<?php $page = "home"; ?>

@extends('layouts.master')

@section('title', 'Home')

@section('content')

</div>

<!-- Home slider -->
<div class="swiper-container swiper-container-horizontal" id="home-slider">
    <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-5724px, 0px, 0px);"><div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-cover="../img/slider/3.jpg" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px" data-swiper-slide-index="2" style="background-image: url(&quot;../img/slider/3.jpg&quot;); height: 460px; width: 1431px;">
        {{-- <div class="swiper-overlay right">
          <div class="text-center">
            <h1 class="bg-white text-dark d-inline-block p-1 animated" data-animate="fadeDown">Brand New</h1>
            <p class="display-4 animated" data-animate="fadeDown">High Quality Clothes</p>
            <a href="shop-grid.html" class="btn btn-primary rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
          </div>
        </div> --}}
      </div>

      <!--Build-->
      <div class="swiper-slide swiper-slide-duplicate-active" data-cover="../img/slider/pc-header.jpg" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px" data-swiper-slide-index="0" style="background-image: url(&quot;../img/slider/1.jpg&quot;); height: 460px; width: 1431px; ">
        <div class="swiper-overlay right">
          <div class="text-center">
            <p class="display-4 animated" data-animate="fadeDown">Customise</p>
            <a href="{{ url('build') }}" class="btn btn-primary animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">Build Now</a>
          </div>
        </div>
      </div>
      <!--/Build-->

      <div class="swiper-slide" data-cover="../img/slider/nvidia-gpu.jpg" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px" data-swiper-slide-index="1" style="background-image: url(&quot;../img/slider/2.jpg&quot;); height: 460px; width: 1431px;">
        <div class="swiper-overlay left">
          <div class="text-center">
            <h1 class="bg-white text-dark d-inline-block p-1 animated" data-animate="fadeDown">Shop Components</h1>
            {{-- <p class="display-4 animated" data-animate="fadeDown">30% - 70% OFF</p> --}}
            <br>
            <a href="" class="btn btn-primary animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">Shop Now</a>
          </div>
        </div>
      </div>

    </div>
    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
    <div class="swiper-button-prev autohide" tabindex="0" role="button" aria-label="Previous slide"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></div>
    <div class="swiper-button-next autohide" tabindex="0" role="button" aria-label="Next slide"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    <!-- /Home slider -->
    
    <div class="container mt-3">

@endsection