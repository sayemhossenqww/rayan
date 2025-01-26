@extends('layouts.app')
@section('title', __('Create') . ' ' . __('Nuts Industry Mixer'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Create') @lang('Nuts Industry Mixer')</div>
        <x-back-btn href="{{ route('nuts-industry-mixer.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('nuts_industry_mixer.partials.form')
        </div>
    </div>
@endsection