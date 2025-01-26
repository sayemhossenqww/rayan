@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Cerak, Double Cream & Ricotta Process'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Cerak, Double Cream & Ricotta Process')</x-page-title>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('dairy_industry.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ]) }}">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('dairy_industry.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('dairy_industry.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
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
                                    <a href="{{ route('dairy_industry.edit', ['dairy'=>$dairy_industry, 'day'=>$i+2]) }}">
                                        {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                                    </a>
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td colspan="8" class="text-center tr-head">From ready-made Areesheh Dairy</td>
                        </tr>
                        <tr>
                            <td>Quantity used</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $dairy_industry['qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Time on fire in minutes</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $dairy_industry['time_fire_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Detail 1</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $dairy_industry['detail_1_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Detail 2</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $dairy_industry['detail_2_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Final Quantity </br>Cerak</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $dairy_industry['cerak_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Final Quantity </br>Double Cream</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $dairy_industry['cream_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Final Quantity </br>Ricotta</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $dairy_industry['ricotta_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .tr-head {
            background-color: red !important; 
            color: white;
        }
    </style>
@endsection
