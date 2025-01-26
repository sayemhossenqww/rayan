@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Milk Details'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Update') @lang('Milk Details') </div>
        <x-back-btn href="{{ route('staffs.milk.details', $details->staff->id) }}" />
    </div>
    <div class="card w-100">
        <div class="card-header">
            <h2>
                Name: {{$details->staff->name}}
                Date: {{ $carbon::now()->setISODate($details->year, $details->week)->addDays($day - 1)->format('d M y') }}
            </h2>
        </div>
        <div class="card-body">
            @include('staffs.partials.details_form')
        </div>
@endsection
