@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Gouda a l’ancienne & regular'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Edit') @lang('Gouda a l’ancienne & regular')</div>
        <x-back-btn href="{{ route('gouda_regular.index') }}" />
    </div>
    <div class="card w-100">
        <div class="card-body">
            @include('gouda_regular.partials.form')
        </div>
    </div>
@endsection
