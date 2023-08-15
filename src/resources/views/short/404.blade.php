@extends('components.main')

@section('container')
    <div class="position-absolute top-50 start-50 translate-middle bg-danger container px-4">
        <div class="row p-3">
            <div class="col">
                <h1 class="h3 fw-normal">{{ __('Link unavailable...') }}</h1>
            </div>
        </div>
    </div>
@endsection
