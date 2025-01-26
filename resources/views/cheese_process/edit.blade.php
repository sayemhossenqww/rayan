@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Cheese Process'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Cheese Process')</div>
        <x-back-btn href="{{ route('cheese_process.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('cheese_process.partials.form')
        </div>
    </div>
@endsection
