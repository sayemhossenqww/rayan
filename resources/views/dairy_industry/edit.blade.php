@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Cerak, Double Cream & Ricotta Process'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Cerak, Double Cream & Ricotta Process')</div>
        <x-back-btn href="{{ route('dairy_industry.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('dairy_industry.partials.form')
        </div>
    </div>
@endsection
