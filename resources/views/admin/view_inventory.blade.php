@extends('layouts.admin')

@section('title', 'Inventory')

@section('content')

    <!-- START Page content-->
    <div class="content-wrapper">
        
    <h3>{{ $part_data->name }}</h3>
    
    @include('layouts.admin-alerts')
    <a href="{{ url('admin/inventory') }}" class="btn btn-xs btn-primary"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Return to Inventory</a> 

        <!-- START row-->
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{ url('/admin/inventory/edit/' . $part_data->id) }}">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{ $part_data->name }}" name='name'>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Type</label>
                                <select name="type" class="form-control m-b">
                                    <option value="cooler" <?php if($part_data->type == 'cooler'){ echo 'selected'; } ?>>Cooler</option>
                                    <option value="case" <?php if($part_data->type == 'case'){ echo 'selected'; } ?>>Case</option>
                                    <option value="cpu" <?php if($part_data->type == 'cpu'){ echo 'selected'; } ?>>CPU</option>
                                    <option value="gpu" <?php if($part_data->type == 'gpu'){ echo 'selected'; } ?>>GPU</option>
                                    <option value="motherboard" <?php if($part_data->type == 'motherboard'){ echo 'selected'; } ?>>Motherboard</option>
                                    <option value="powersupply" <?php if($part_data->type == 'powersupply'){ echo 'selected'; } ?>>Powersupply</option>
                                    <option value="ram" <?php if($part_data->type == 'ram'){ echo 'selected'; } ?>>RAM</option>
                                    <option value="storage" <?php if($part_data->type == 'storage'){ echo 'selected'; } ?>>Storage</option>
                                </select>
                            </div>            
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" value="{{ $part_data->stock }}" name='stock'>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Price (£)</label>
                                <input type="number" step=".01" class="form-control" value="{{ $part_data->price }}" name='price'>
                            </div>
                        </div>

                        @if($part_data->type == 'cpu' || $part_data->type == 'motherboard')
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label for="">Socket Type</label>
                                    <input type="text" class="form-control" value="{{ $part_data->socket }}" name='socket'>
                                </div>
                            </div>
                        @endif

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label for="">Specs</label>
                                <textarea type="text" class="form-control" value="" name='specs' rows="3">{{ $part_data->specs }}</textarea>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row text-center ">
                            @if($part_data->imag)
                                <img class="" src="{{ asset('/img/part-img/' . $part_data->image) }}" style="max-height:200px;max-width:100;">
                            @endif
                                <form method="POST" action="{{ url('/admin/inventory/edit-image/' . $part_data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group file-chooser">
                                        <input name="part_image" type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);"><div class="bootstrap-filestyle input-group">
                                    </div>
                                    <br>
                                    <div class="form-group text-left">
                                        <input class="btn btn-primary" type="submit" value="Update Image">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection