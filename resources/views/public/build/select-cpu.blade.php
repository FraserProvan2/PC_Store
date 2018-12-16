<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<!-- List of Parts -->
<div class="row gutters-3 mt-3">
    <div class="col-12">
        <div class="card-header h5 bold">Central Processing Unit</div>
        <div class="card card-product card-product-list">
            
            <div class="card-body">
                

                <!--Part Table-->
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cpu_data as $cpu)
                            <tr>
                                <form method="POST" action="add-cpu">
                                    @csrf
                                    <input type="hidden" name="cpu_id" value="{{ $cpu->id }}">
                                    <td>{{ $cpu->name }}</td>
                                    <td><input type="submit" class="btn btn-sm btn-primary" value="Add to Build"></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>       
                        
       
            </div>
        </div>
    </div>
</div>
    </div>
</div>
</div>
<!-- /List of Parts -->

@endsection
