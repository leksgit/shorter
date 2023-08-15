@extends('components.main')

@section('container')
    <div class="position-absolute top-50 start-50 translate-middle bg-info container px-4">
        <div class="row p-3">
            <div class="col">
                <h1 class="h3 fw-normal">{{ __('Congratulations! You have successfully created a short link that you can share with everyone!') }}</h1>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col">
                <table class="table m-6">
                    <tbody>
                    <tr>
                        <th scope="row">{{ __('You URL') }}</th>
                        <td>{{ $short->source_url }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ __('Short URL') }}</th>
                        <td><a href="{{ $short->short_url }}" target="_blank">{{ $short->short_url }}</a></td>
                    </tr>
                    <tr>
                        <th scope="row">{{ __('Allowed number of uses (if zero - unlimited use)') }}</th>
                        <td>{{ $short->allowed_number_of_uses }}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{ __('Available until') }}</th>
                        <td>{{ $short->available_until->toDateTimeString() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
