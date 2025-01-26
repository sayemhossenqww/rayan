
@extends('layouts.app')
@section('title', __('Staffs'))

@section('content')
<div class="d-flex align-items-center justify-content-center mb-3">
    <div class="h4 mb-0 flex-grow-1">
        @lang('Attendance')
    </div>
    <x-back-btn href="{{ route('attendances.index') }}" />
</div>
<div class="card w-100">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card w-100 p-5">
                    @include('attendances.partials.in')
                </div>
            </div>
            <div class="col-md-6">
                <div class="card w-100 p-5">
                    @include('attendances.partials.out')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection