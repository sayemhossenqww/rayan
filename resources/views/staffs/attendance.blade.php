@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Edit') . ' ' . __('Staff'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Staff') @lang('Attendance') </div>
        <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('staffs.attendance.print', ['staff'=>$staff, 'year'=>$carbon::createFromDate($year, $month, 1)->format('y'), 'month'=>$carbon::createFromDate($year, $month, 1)->format('m') ]) }}">Print</a>
        <x-back-btn href="{{ route('staffs.index') }}" />
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('staffs.attendance', ['staff'=>$staff, 'year'=>$carbon::createFromDate($year, $month-1, 1)->format('y'), 'month'=>$carbon::createFromDate($year, $month-1, 1)->format('m') ]) }}">Prev Month</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('staffs.attendance', ['staff'=>$staff, 'year'=>$carbon::createFromDate($year, $month+1, 1)->format('y'), 'month'=>$carbon::createFromDate($year, $month+1, 1)->format('m') ]) }}">Next Month</a>
    </div>
    <div class="card w-100">
        <div class="card-header">
            <h2>Name: {{$staff->name}}</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover table-hover-x">
                <thead>
                    <tr>
                        <th>@lang('Day')</th>
                        <th>@lang('Date')</th>
                        <th>@lang('In')</th>
                        <th>@lang('Out')</th>
                        <th>@lang('Signature')</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @for ($i = 1; $i <= $carbon::createFromDate($year, $month, 1)->endOfMonth()->format('d'); $i++)
                        <tr 
                            class={{$carbon::createFromDate($year, $month, $i)->dayName == 'Sunday' ? 'text-red' : ''}}
                        >
                            <td>
                                <a href="{{ route('staffs.do.attendance', $attendance) }}/{{ $i }}">
                                    {{ $carbon::createFromDate($year, $month, $i)->dayName }}
                                </a>
                            </td>
                            <td>{{ $i }} {{ $carbon::createFromDate($year, $month, $i)->format('M') }} {{ $carbon::createFromDate($year, $month, $i)->format('y') }}</td>
                            <td>{{$attendance['in_'.$i]}}</td>
                            <td>{{$attendance['out_'.$i]}}</td>
                            <td></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
    <style type="text/css">
        .text-red {
            color: #ff0000;
        }
    </style>
@endsection
