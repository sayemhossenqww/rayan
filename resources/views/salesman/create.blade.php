@extends('layouts.app')
@section('title', __('Create') . ' ' . __('Root'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('New Salesman')</x-page-title>
        </div>
        <x-back-btn href="{{ route('salesman.index') }}" />
    </div>
    <x-card>
        @include('salesman.partials.salesman_form')
    </x-card>
@endsection
