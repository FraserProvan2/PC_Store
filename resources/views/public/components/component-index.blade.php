<?php $page = "component"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="row gutters-3">

        <!-- Shop Filters -->
        <div class="col-lg-3 col-md-4">
          <div class="accordion accordion-caret accordion-sidebar d-none d-md-block">

            <div class="card">
              <div id="filter-categories" style="">
                <div class="card-body p-2">
                    @if(Request::url() != 'components')
                        <h5 class="ml-3 mt-2">Sort</h5>
                    @endif
                    <hr>

                    <ul class="list-unstyled">
                        <li><a href="{{ url('components') }}" class="btn filters-comp" id="cpu">All</a></li>
                        <li><a href="{{ url('components/gpu') }}" class="btn filters-comp">Graphics Cards</a></li>
                        <li><a href="{{ url('components/cpu') }}" class="btn filters-comp" id="cpu">Processors</a></li>
                        <li><a href="{{ url('components/motherboard') }}" class="btn filters-comp">Motherboards</a></li>
                        <li><a href="{{ url('components/ram') }}" class="btn filters-comp">RAM</a></li>
                        <li><a href="{{ url('components/case') }}" class="btn filters-comp">Cases</a></li>
                        <li><a href="{{ url('components/powersupply') }}" class="btn filters-comp">Power Supplies</a></li>
                    </ul>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /Shop Filters -->

        <div class="col-lg-9 col-md-8">

        @include('layouts.alerts')

          <!-- Shop Grid -->
          <div class="card-deck card-deck-product with-sidebar" id="components">

            @foreach($parts as $part)
                <div class="card card-product card-comp align-text-bottom">
                    <div class="card-body">
                        <img class="card-img-top image-comp" src="../img/part-img/{{ $part['image'] }}" alt="Card image cap">
                        <a class="card-title">{{ $part->name }}</a>
                        <small>{{ $part->specs }}</small>
                        <div class="price mt-2"><span class="h5">£{{ number_format($part->price, 2) }}</span></div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('cart/add/component/' . $part->id) }}" class="btn btn-sm btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            @endforeach

          </div>
          <!-- /Shop Grid -->
        </div>
</div>

@endsection