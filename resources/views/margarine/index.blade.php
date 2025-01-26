@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Margarine'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Margarine')</x-page-title>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('margarine.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ]) }}">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('margarine.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('margarine.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center tr-head">
                            <th>@lang('Day')</th>
                            <th>@lang('Sunday')</th>
                            <th>@lang('Monday')</th>
                            <th>@lang('Tuesday')</th>
                            <th>@lang('Wednesday')</th>
                            <th>@lang('Thursday')</th>
                            <th>@lang('Friday')</th>
                            <th>@lang('Saturday')</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <tr>
                            <td>@lang('Date')</td>
                            @for ($i = -1; $i < 6; $i++)
                                <td>
                                    <a href="{{ route('margarine.edit', ['margarine'=>$margarine, 'day'=>$i+2]) }}">
                                        {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                                    </a>
                                </td>
                            @endfor
                        </tr>
                        @foreach ($fields1 as $key => $value)        
                            <tr>
                                <td>{{ $value }}</td>
                                @for ($i = 1; $i <= 7; $i++)
                                    <td>
                                        {{ $margarine[$key.'_'.$i]}}
                                    </td>
                                @endfor
                            </tr>
                            @if ($key == 'qty' || $key == 'jar_qty_2')
                                <tr class="tr-color">
                                    <td colspan="8"></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .tr-head {
            background-color: rgb(6, 0, 7) !important; 
            color: white;
        }

        .tr-color {
            background-color: rgb(6, 0, 7) !important; 
            color: white;
            text-align: center;
        }
    </style>
@endsection
