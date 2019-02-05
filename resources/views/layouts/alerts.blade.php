@if (Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong>Success!</strong> {!! Session::get('message') !!}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger text-center" role="alert">
        <strong>Error!</strong> {!! Session::get('error') !!}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center">{{ $error }}</div>
    @endforeach
@endif