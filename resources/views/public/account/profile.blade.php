@extends('layouts.master')

@section('title', 'Account')

@section('content')

<div class="row">

    <div class="col-md-4 col-lg-3">
        <div class="card">
        <div class="card-body text-center">
            <h5 class="bold mb-0">John Thor</h5>
            <small class="counter">Joined Dec 31, 2017</small>
        </div>
        <div class="list-group list-group-flush">
            <a href="/account" class="list-group-item list-group-item-action active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>
            <a href="/account/orders" class="list-group-item list-group-item-action"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag mr-3"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg> Orders</a>
            <a class="list-group-item list-group-item-action text-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i data-feather="log-out"></i>    
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Logout') }}
            </a>
        </div>
        </div>
    </div>

    <div class="col mt-3 mt-md-0">
        <div class="card">
        <div class="card-body">
            <h3>My Profile</h3><hr>
            <form>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="profileFirstName">Name</label>
                        <input type="text" class="form-control" id="profileFirstName" value="John">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="profileEmail">Email address</label>
                        <input type="email" class="form-control" id="profileEmail" value="john.thor@example.com">
                    </div>
                </div>
                <button type="button" class="btn btn-primary">Update Details</button>
            </form>
        </div>

        <div class="card-body">
                
            <form method="POST" action="{{ route('password.update') }}">
                <div class="form-row">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group col-sm-6">
                        <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
            
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>      
        </div>

    </div>

    </div>

@endsection