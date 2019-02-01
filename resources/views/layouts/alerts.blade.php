@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {!! Session::get('message') !!}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif