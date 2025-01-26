@extends('layouts.app')
@section('title', __('Create') . ' ' . __('Root'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Edit Root')</x-page-title>
        </div>
        <x-back-btn href="{{ route('roots.index') }}" />
    </div>
    <x-card>
        @include('roots.partials.form')
    </x-card>
@endsection
