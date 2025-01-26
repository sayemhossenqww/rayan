@extends('layouts.app')
@section('title', __('Create') . ' ' . __('Cheese and Labneh'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Create') @lang('Cheese and Labneh')</div>
        <x-back-btn href="{{ route('cheeses.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('cheeses.partials.form')
        </div>
    </div>
@endsection
