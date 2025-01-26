@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Staffs'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">
            {{ $day }} {{ $carbon::createFromDate($year, $month, $day)->format('M') }} {{ $carbon::createFromDate($year, $month, $day)->format('y') }} @lang('Attendance')</div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('attendances.index', ['day'=>$day-1, 'year'=>$carbon::createFromDate($year, $month, $day-1)->format('y'), 'month'=>$carbon::createFromDate($year, $month, $day-1)->format('m') ]) }}">Prev Day</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('attendances.index', ['day'=>$day+1, 'year'=>$carbon::createFromDate($year, $month, $day+1)->format('y'), 'month'=>$carbon::createFromDate($year, $month, $day+1)->format('m') ]) }}">Next Day</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('In')</th>
                            <th>@lang('Out')</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @foreach ($staffs as $staff)
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    <a href="{{ route('attendances.show', ['attendance'=>$attendances[$staff->id], 'day'=>$day]) }}">
                                        {{ $staff->name }} 
                                    </a>
                                </td>
                                <td class="align-middle fw-bold">{{$attendances[$staff->id]['in_'.$day]}}</td>
                                <td class="align-middle fw-bold">{{$attendances[$staff->id]['out_'.$day]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($staffs->isEmpty())
                    <x-no-data />
                @endif
            </div>
            <div class="">
                {{ $staffs->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
