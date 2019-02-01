<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="container my-3">
    <div class="card">
      <div class="card-body px-1 px-md-5 pt-5">

        <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
          <h2 class="bold text-center">
            {{ $list_data->name }}

            @if($list_data->purchased != 1)
                <button type="button" class="btn btn-lg text-primary pl-0" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
            @endif
        </h3>

            @if($list_data['purchased'])
                <div class="alert alert-success text-center" role="alert">
                    You purchased this on <strong>{{ $list_data['purchase_date'] }}</strong>
                </div>
            @endif

          @include('layouts.alerts')

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

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <strong>Compatibility Error! Fix the errors add to Cart</strong>
                <br>
                <a>{!! Session::get('error') !!}</a> 
            </div>
        @endif

        <div class="text-center">
            <small class="counter">TOTAL</small>
            <h3 class="roboto-condensed bold">£{{ number_format($total_price, 2) }}</h3>
            
            <form action="{{ url('cart/add/part_list') }}" method="POST">
                @csrf

                <input type="hidden" name="price" value="{{ $total_price }}">
                <input type="hidden" name="partlist_id" value="{{ $list_data['id'] }}">
                <input type="hidden" name="partlist_name" value="{{ $list_data->name }}">

                @if($list_data['purchased'] == false)
                    @if (Session::has('error') || !isset($list_checked))
                        <button class="btn btn-primary disabled mb-3" disabled="disabled">Add to Cart <i data-feather="arrow-right"></i></button>
                        <br>
                        <p class="text-danger text-bold">Select all parts to add the Build to Cart!</p>
                    @else
                        <button type="submit" class="btn btn-primary">
                            Add to Cart <i data-feather="arrow-right"></i>
                        </button>
                    @endif
                @endif
            </form>
        
        </div>
      </div>
    </div>
</div>
      
    @if($list_data->purchased != 1)
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Build Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('build/updatename') }}">
                @csrf
                <div class="modal-body">
                    <input class="form-control form-control-lg mb-2" type="text" value="{{ $list_data->name }}" name='new_title' required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    @endif

@endsection