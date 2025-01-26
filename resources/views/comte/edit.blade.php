@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Le Comte & La Comtesse'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Le Comte & La Comtesse')</div>
        <x-back-btn href="{{ route('comte.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('comte.partials.form')
        </div>
    </div>
@endsection
