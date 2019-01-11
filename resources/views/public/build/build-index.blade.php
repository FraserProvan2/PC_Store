<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="card">

    <div class="card-body">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {!! Session::get('message') !!}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">

                @if(Session::has('current_part_list'))
                    <a href="{{ url('build/load') }}" class="btn btn-primary btn-lg" style="width: 100%">Resume "{{ $list_data->name }}"</a>
                    <br>
                    <hr>
                @endif

                <h5 class="bold">Create a New Build</h5>
                <form action="{{ url('build/create') }}" method="post">
                    {{ csrf_field() }}
                    <input class="form-control form-control" type="text" placeholder="Name your build" name="build-name" required><br>
                    <button type="submit" class="btn btn-primary">Create New</button>
                <form>
                <br><br>
            </div>

            <div class="col-md-6">
                <h5 class="bold">Your Saved Builds</h5>
                @if(Auth::user())

                <table class="table table-hover">
                    <tbody>
                        @if($users_lists)
                            @foreach($users_lists as $list)
                            <tr>
                                <th scope="row">{{ $list['name'] }}</th>
                                <th scope="row ">
                                    <a href="{{ url('build/delete/' . $list['id']) }}" class="btn-sm btn-danger pull-right"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <a href="{{ url('build/view/' . $list['id']) }}" class="btn-sm btn-primary pull-right  mr-1"><i class="fa fa-search"></i> View </a>
                                </th>
                            </tr>
                            @endforeach
                        @else
                            <p>Save Builds and Checkout later!</p>
                        @endif
                    </tbody>
                </table>

                @else
                    <p><a href="{{ url('register') }}" class="bold">Register</a> to save builds for later!</p>
                @endif
            </div>
        </div>
        
    </div>
</div>

@endsection