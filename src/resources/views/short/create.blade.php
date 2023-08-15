@extends('components.main')

@section('container')

    <form class="position-absolute top-50 start-50 translate-middle"
          method="POST" action="{{ route('createShort') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">{{ __('Please fill data about your short link') }}</h1>

        <div class="form-floating">
            <input type="text" class="form-control @error('source_url') is-invalid @enderror" id="floatingLink"
                   name="source_url"
                   required
                   placeholder="https://www.google.com/search?q=asdf" value="{{ old('source_url') }}">
            <label for="floatingLink">{{ __('Your URL for which you want to generate a link') }}</label>
            @error('source_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="number" min="0" class="form-control @error('allowed_number_of_uses') is-invalid @enderror"
                   id="floatingAllowedNumberOfUses"
                   name="allowed_number_of_uses" value="{{ old('allowed_number_of_uses') }}">
            <label for="floatingAllowedNumberOfUses">{{ __('Allowed number of uses (if zero - unlimited use)') }}</label>
            @error('allowed_number_of_uses')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="number" min="1" max="24" class="form-control @error('hours_available') is-invalid @enderror"
                   id="floatingHoursAvailable"
                   name="hours_available" value="{{ old('hours_available') }}">
            <label for="floatingHoursAvailable">{{ __('How many hours available (max 24)') }}</label>
            @error('hours_available')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">{{ __('Generate!') }}</button>
    </form>

@endsection
