<?php $page = "build"; ?>

@extends('layouts.master')

@section('title', 'Build PC')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <h3 class="bold">Create a new build</h3>
                <form action="/build/create" method="post">
                    {{ csrf_field() }}
                    <input class="form-control form-control-lg" type="text" placeholder="Name your build" name="build-name" required><br>
                    <button type="submit" class="btn btn-primary">Create New</button>
                <form>
                @if(Session::has('current_part_list'))
                    <span class="or-span">Or</span>
                    <a href="/build/load" class="btn btn-primary">Resume Current Build</a>
                    <br><br>
                @endif
            </div>
        </div>
    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
        <h3 class="bold">Your saved lists</h3>
    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
        <h3 class="bold">Presets</h3>
    </div>
</div>

@endsection