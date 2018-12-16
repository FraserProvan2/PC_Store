<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="container my-3">
    <div class="card">
      <div class="card-body px-1 px-md-5 pt-5">
        <?php if(isset($message)){ ?>
            <div class="alert alert-success">
                {{ $message }}
            </div>
        <?php } ?>
        <h3 class="bold">{{ $list_data->name }}</h3>
        <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
          <tbody>
            
            @include('public.build.parts.cpu')

          </tbody>
        </table>
        <div class="text-center">
          <small class="counter">SUBTOTAL</small>
          <h3 class="roboto-condensed bold">$120.00</h3>
          <a href="" class="btn btn-secondary">Save List<i data-feather="plus"></i></a>
          <a href="" class="btn btn-primary">Add to Cart <i data-feather="arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>

@endsection