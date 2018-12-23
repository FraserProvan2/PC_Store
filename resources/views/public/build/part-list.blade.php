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

        <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
          <h3 class="bold text-center">{{ $list_data->name }}</h3>
          <tbody>

            <?php $total_price = 00.00; ?>

            @include('public.build.parts.part-template', $part_type = ["case"])
            <?php if(isset($case_data)){ $total_price += $case_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["cpu"])
            <?php if(isset($cpu_data)){ $total_price += $cpu_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["cooler"])
            <?php if(isset($cooler_data)){ $total_price += $cooler_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["gpu"])
            <?php if(isset($gpu_data)){ $total_price += $gpu_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["motherboard"])
            <?php if(isset($mobo_data)){ $total_price += $mobo_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["ram"])
            <?php if(isset($ram_data)){ $total_price += $ram_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["storage"])
            <?php if(isset($storage_data)){ $total_price += $storage_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["powersupply"])
            <?php if(isset($powersupply_data)){ $total_price += $powersupply_data['price']; } ?>
          
          </tbody>
        </table>
        <div class="text-center">
          <small class="counter">SUBTOTAL</small>
          <h3 class="roboto-condensed bold">£ {{ number_format($total_price, 2) }}</h3>
          
          <a href="" class="btn btn-outline-primary">Save List <i data-feather="plus"></i></a>
          <a href="" class="btn btn-primary">Add to Cart <i data-feather="arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>

@endsection