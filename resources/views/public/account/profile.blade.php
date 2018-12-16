@extends('layouts.master')

@section('title', 'Account')

@section('content')

<div class="row">

    <?php $sidebar_page = "profile"; ?>
    @include('layouts.account-sidebar') 

    <div class="col mt-3 mt-md-0">
        <div class="card">
        <div class="card-body">
            <h3>My Profile</h3><hr>
            
            <!--Success Message-->
            <?php if(isset($message_details)){ ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $message_details; ?>
                </div>
            <?php } ?>

            <!--Error Message-->
            <?php if(isset($error_details)){ ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error_details; ?>
                </div>
            <?php } ?>

            <form method="POST" action="/account/update/details">
                <div class="form-row">
                    @csrf
                    <div class="form-group col-sm-6">
                        <label for="profileFirstName">Name</label>
                        <input type="text" class="form-control" id="profileFirstName" value="{{ $user_data['name'] }}" name="name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="profileEmail">Email address</label>
                        <input type="email" class="form-control" id="profileEmail" value="{{ $user_data['email'] }}" name="email" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Details') }}
                </button>
            </form>
        </div>

        <div class="card-body">
            <!--Success Message-->
            <?php if(isset($message_password)){ ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $message_password; ?>
                </div>
            <?php } ?>

            <!--Error Message-->
            <?php if(isset($error_password)){ ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error_password; ?>
                </div>
            <?php } ?>
            <form method="POST" action="/account/update/password">
                <div class="form-row">
                    @csrf

                    <div class="form-group col-sm-6">
                        <label for="password">{{ __('New Password') }}</label>

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
                            {{ __('Update Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>      
        </div>

    </div>

    </div>

@endsection