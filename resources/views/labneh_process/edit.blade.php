@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Labneh Process'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Labneh Process')</div>
        <x-back-btn href="{{ route('labneh_process.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('labneh_process.partials.form')
        </div>
    </div>
@endsection
