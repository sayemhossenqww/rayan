@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Tomme'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Tomme')</div>
        <x-back-btn href="{{ route('tomme.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('tomme.partials.form')
        </div>
    </div>
@endsection
