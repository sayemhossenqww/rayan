@extends('layouts.app')
@section('title', __('Create') . ' ' . __('Staff'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Create') @lang('Staff')</div>
        <x-back-btn href="{{ route('staffs.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('staffs.partials.form')
        </div>
    </div>
@endsection
