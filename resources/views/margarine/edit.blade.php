@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Margarine'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Margarine')</div>
        <x-back-btn href="{{ route('margarine.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('margarine.partials.form')
        </div>
    </div>
@endsection
