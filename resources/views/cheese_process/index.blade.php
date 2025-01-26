@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Cheese Process'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Cheese Process')</x-page-title>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('cheese_process.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ]) }}">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('cheese_process.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('cheese_process.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
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
                                    <a href="{{ route('cheese_process.edit', ['cheese'=>$cheese, 'day'=>$i+2]) }}">
                                        {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                                    </a>
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Quantity used</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Milk Analyzer Test</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['milk_analyzer_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>On fire @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['time_on_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Off of fire @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['time_off_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Cooled down @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['cooled_down_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Rennet quantity</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['rennet_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Added @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['added_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Fermented @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['fermented_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Cut @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['cut_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Quantity of </br>Balady cheese</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese['balady_cheese_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                    </tbody>

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
                        <tr class="tr-color">
                            <td>Put in Mold @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese->cheese2['put_in_mold_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color">
                            <td>Boiling started @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese->cheese2['boiling_started_1_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color">
                            <td>Boiling started @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese->cheese2['boiling_started_2_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color">
                            <td>Quantity of Halloum cheese</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese->cheese2['halloum_cheese_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color">
                            <td>In fridge @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese->cheese2['in_fridge_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Quantity of </br>Akkwai cheese</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $cheese->cheese2['akkwai_cheese_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <tr class="text-center tr-head">
                                <th>@lang('Total')</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .tr-head {
            background-color: rgb(33, 236, 80) !important; 
            color: white;
        }

        .tr-color {
            background-color: rgb(246, 213, 141) !important; 
        }
    </style>
@endsection
