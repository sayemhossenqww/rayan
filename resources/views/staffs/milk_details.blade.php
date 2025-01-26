@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Milk Details'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">@lang('Staff') @lang('Milk Details') </div>
        <x-back-btn href="{{ route('staffs.index') }}" />
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('staffs.milk.details', ['staff'=>$staff, 'year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('staffs.milk.details', ['staff'=>$staff, 'year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
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
                        <th>@lang('Milk 1st Qty')</th>
                        <th>@lang('Temperature')</th>
                        <th>@lang('Water %')</th>
                        <th>@lang('Milk 2nd Qty')</th>
                        <th>@lang('Temperature')</th>
                        <th>@lang('Water %')</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @for ($i = -1; $i < 6; $i++)
                        <tr 
                            class={{$carbon::now()->setISODate($year, $week)->addDays($i)->dayName == 'Sunday' ? 'text-red' : ''}}
                        >
                            <td>
                                <a href="{{ route('staffs.do.detail', $details) }}/{{ $i + 2 }}">
                                    {{ $carbon::now()->setISODate($year, $week)->addDays($i)->dayName }}
                                </a>
                            </td>
                            <td>
                                {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                            </td>
                            <td>{{ $details['1_qty_'.($i + 2)] }}</td>
                            <td>{{ $details['1_temperature_'.($i + 2)] }}</td>
                            <td>{{ $details['1_water_'.($i + 2)] }}</td>
                            <td>{{ $details['2_qty_'.($i + 2)] }}</td>
                            <td>{{ $details['2_temperature_'.($i + 2)] }}</td>
                            <td>{{ $details['2_water_'.($i + 2)] }}</td>
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
