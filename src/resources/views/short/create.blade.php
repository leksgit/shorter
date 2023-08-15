@extends('components.main')

@section('container')

    <form class="position-absolute top-50 start-50 translate-middle"
          method="POST" action="{{ route('createShort') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">{{ __('Please fill data about yor short link') }}</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingLink" name="source_url"
                   placeholder="https://www.google.com/search?q=asdf">
            <label for="floatingLink">{{__('You URL for which you want to generate a link')}}</label>
        </div>
        <div class="form-floating">
            <input type="number" min="0" class="form-control" id="floatingAllowedNumberOfUses"
                   name="allowed_number_of_uses">
            <label
                    for="floatingAllowedNumberOfUses">{{ __('Allowed number of uses (if zero - unlimited use)') }}</label>
        </div>
        <div class="form-floating">
            <input type="number" min="1" max="24" class="form-control" id="floatingHoursAvailable"
                   name="hours_available">
            <label for="floatingHoursAvailable">{{ __('How many hours available(max 24)') }}</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">{{ __('Generate!') }}</button>
    </form>
@endsection
