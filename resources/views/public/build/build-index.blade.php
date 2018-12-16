<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">

                @if(Session::has('current_part_list'))
                    <h5 class="bold">Resume ''</h5>
                    <a href="/build/load" class="btn btn-primary">Resume</a>
                    <br>
                    <hr>
                @endif

                <h5 class="bold">Create a New Build</h5>
                <form action="/build/create" method="post">
                    {{ csrf_field() }}
                    <input class="form-control form-control" type="text" placeholder="Name your build" name="build-name" required><br>
                    <button type="submit" class="btn btn-primary">Create New</button>
                <form>
            </div>

            <div class="col-md-6">
                
                <h5 class="bold">Your Saved Builds</h5>
                @if(Auth::user())
                    table here
                @else
                    <p><a href="/register" class="bold">Register</a> to save builds for later!</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection