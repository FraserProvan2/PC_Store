<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="container my-3">
    <div class="card">
      <div class="card-body px-1 px-md-5 pt-5">

        <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
          <h3 class="bold text-center">{{ $list_data->name }}</h3>

            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> {!! Session::get('message') !!}
                </div>
            @endif


          <tbody>

            <?php $total_price = 00.00; ?>

            @include('public.build.parts.part-template', $part_type = ["case"])
            <?php if(isset($case_data)){ $total_price += $case_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["cpu"])
            <?php if(isset($cpu_data)){ $total_price += $cpu_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["cooler"])
            <?php if(isset($cooler_data)){ $total_price += $cooler_data['price']; } ?>

            @include('public.build.parts.part-template', $part_type = ["gpu"])
            <?php 
                $add_card_amount = $list_data->add_card + 1;
                $gpu_price = $add_card_amount * $gpu_data['price'];
              
                if(isset($gpu_data)){ 
                    $total_price += $gpu_price; 
                } 
            ?>

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

        @if (1 + 1 == 3)
            <div class="alert alert-danger" role="alert">
                <strong>Compatibility Error! Fix the errors add to Cart</strong>
                <br><br>
                <p>{!! Session::get('error') !!}</p> 
            </div>
        @endif

        <div class="text-center">
            <small class="counter">TOTAL</small>
            <h3 class="roboto-condensed bold">£{{ number_format($total_price, 2) }}</h3>
            
            <form action="/cart/add/part_list" method="POST">
                @csrf

                <input type="hidden" name="price" value="{{ $total_price }}">
                <input type="hidden" name="partlist_id" value="{{ $list_data['id'] }}">
                <input type="hidden" name="partlist_name" value="{{ $list_data->name }}">

                @if (1 + 1 == 3)
                    <button class="btn btn-primary disabled" disabled="disabled">Add to Cart <i data-feather="arrow-right"></i></button>
                @else
                    <button type="submit" class="btn btn-primary">
                        Add to Cart <i data-feather="arrow-right"></i>
                    </button>
                @endif
            </form>
        
        </div>
      </div>
    </div>
  </div>

@endsection