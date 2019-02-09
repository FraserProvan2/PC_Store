@extends('layouts.admin')

@section('title', 'Inventory')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style=" z-index: 100000 !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('admin/inventory/add') }}">
              @csrf
              <label for="">Part Name</label>
              <input type="text" class="form-control" name='part_name'>
              <br>
              <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add New</button>
        </div>
        </div>
    </div>
</div>

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        <h3>Inventory</h3>

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Create New
        </button>
        
        <!-- START row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parts as $part)
                                    <tr>
                                        <td>
                                            <a href="{{ url('/admin/inventory/' . $part->id) }}">
                                            {{ $part->name }}
                                            </a>
                                        </td>
                                        <td>{{ $part->type }}</td>
                                        <td>£{{ number_format($part->price, 2) }}</td>
                                        <td class="<?php if($part->stock < 1){ echo 'danger'; }?>">{{ $part->stock }}</td>
                                        <td>  
                                            <a href="{{ url('/admin/inventory/' . $part->id) }}" class="btn-sm btn-default">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $parts->links(); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection