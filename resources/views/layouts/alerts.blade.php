@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {!! Session::get('message') !!}
    </div>
@endif