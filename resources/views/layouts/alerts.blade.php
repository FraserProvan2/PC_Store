@if (Session::has('message'))
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {!! Session::get('message') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {!! Session::get('error') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center">{{ $error }}</div>
    @endforeach
@endif