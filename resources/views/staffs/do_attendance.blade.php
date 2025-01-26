@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Staff'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Update') @lang('Attendance') </div>
        <x-back-btn href="{{ route('staffs.attendance', $attendance->staff->id) }}" />
    </div>
    <div class="card w-100">
        <div class="card-header">
            <h2>
                Name: {{$attendance->staff->name}}
                Date: {{ $day }} / {{$attendance->month}}
            </h2>
        </div>
        <div class="card-body">
            @include('staffs.partials.attendance_form')
        </div>
@endsection
