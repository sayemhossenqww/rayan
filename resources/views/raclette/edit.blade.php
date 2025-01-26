@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Raclette'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Raclette')</div>
        <x-back-btn href="{{ route('raclette.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('raclette.partials.form')
        </div>
    </div>
@endsection
