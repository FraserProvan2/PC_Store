<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="row">
    <div class="col-12 mt-2">
        @if(session('compat_filter') == 'off')
            <a href="{{ url('build/filter/on') }}" class="btn-sm  btn-primary">Turn On Compatability Filter</a>
        @else
            <a href="{{ url('build/filter/off') }}" class="btn-sm  btn-secondary">Turn Off Compatability Filter</a>
        @endif
    </div>
    
    @foreach($part_data as $part)
    <div class="col-12 mt-2">
        <div class="card card-product card-product-list">
            <a><img class="card-img-top part-img-" src="{{ asset('/img/part-img/' . $part['image']) }}" style="max-width:70%;"></a>
            <div class="card-body">
            <a  class="card-title">{{ $part['name'] }}</a>
            <div class="attr">
                <div class="price"><span class="h5">£{{ $part['price'] }}</span></div>
                {{-- <span class="badge badge-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> Best Seller</span> --}}
            </div>

            <p class="d-none d-sm-block">{{ $part['specs'] }}</p>

            <a href="{{ url('add/' . $part['id']) }}" class="btn btn-sm btn-primary">Add to Build <i class="fa fa-plus" aria-hidden="true"></i></a>
            <a href="{{ url('build/load') }}" class="btn btn-secondary btn-sm">Return <i class="fa fa-undo" aria-hidden="true"></i></a>

            </div>
        </div>
    </div>

    @endforeach

</div>

@endsection