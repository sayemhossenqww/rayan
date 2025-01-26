@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Kishek'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Kishek')</div>
        <x-back-btn href="{{ route('kishek.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('kishek.partials.form')
        </div>
    </div>
@endsection
