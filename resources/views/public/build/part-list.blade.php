<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="container my-3">
    <div class="card">
      <div class="card-body px-1 px-md-5 pt-5">
        <h3 class="bold">{{ $list_data->name }}</h3>
        <table class="table table-borderless table-cart" data-addclass-on-smdown="table-sm">
          <tbody>
            


            <tr>
              <td class="cart-title">
                <a href="shop-single.html" class="h6 bold d-inline-block" title="Hanes Hooded Sweatshirt">CPU</a>
                <br> 
                <a href="/select-cpu" class="btn-sm btn-primary">Add <i class="fa fa-plus" aria-hidden="true"></i></a>
                <small class=""><b>£</b>18.56</small>
              </td>
              <td class="cart-price text-right">       
                <a href="shipping.html" class="btn-sm btn-secondary"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="shipping.html" class="btn-sm btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                <span class="roboto-condensed bold"></span>
              </td>
            </tr>
            
            
            
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