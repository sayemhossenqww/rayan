@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Gouda a l’ancienne & regular'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Gouda a l’ancienne & regular')</x-page-title>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('gouda_regular.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ]) }}">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('gouda_regular.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('gouda_regular.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
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
                                    <a href="{{ route('gouda_regular.edit', ['regular'=>$regular, 'day'=>$i+2]) }}">
                                        {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                                    </a>
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Quantity of Milk</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>On Fire @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['time_on_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Off of Fire @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['time_off_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Cooled down @ </td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['cooled_down_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Ferment Added @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['ferment_added_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Quantity of Ferment added</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['ferment_added_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Pressured @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['pressured_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Temperature</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['temperature_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>On fire & Cut @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['fire_cut_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Water Temperature</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['water_temperature_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Serum removed</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular['serum_removed_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Put in water</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular->regular2['put_in_water_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>In mold @</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular->regular2['in_mold_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Date</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular->regular2['date_view'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Water</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular->regular2['water_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Salt</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular->regular2['salt_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Quantity of l’ancienne</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular->regular2['lancienne_qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Quantity of regular</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $regular->regular2['reqular_qty_'.$i]}}
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
            background-color: rgb(236, 134, 33) !important; 
            color: white;
        }

        .tr-color {
            background-color: rgb(246, 213, 141) !important; 
        }
    </style>
@endsection
