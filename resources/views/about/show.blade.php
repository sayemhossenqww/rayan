@extends('layouts.app')
@section('title', __('About'))

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-3">
                <div class="fs-1 text-primary fw-bolder mb-3">
                    <img src="{{asset('/images/WMKTech.png')}}" alt="wmk tech" height="54">
                </div>
                <div>Application ID 7BS31237-H222C-B30C-0B481246D1-05FF</div>
                <div>Phone Number: +96181203933</div>
                <div>Version 1.0.6</div>
                <div class="small text-muted">
                    v{{ Illuminate\Foundation\Application::VERSION }} (v{{ PHP_VERSION }})
                </div>
                <div>
                   WMKTECH © {{ date('Y') }} Copyright
                </div>
            </div>
        </div>
    </div>
@endsection
