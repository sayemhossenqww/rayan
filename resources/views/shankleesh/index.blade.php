@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Shankleesh Process'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Shankleesh Process')</x-page-title>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('shankleesh.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ]) }}">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('shankleesh.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('shankleesh.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
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
                                    <a href="{{ route('shankleesh.edit', ['shankleesh'=>$shankleesh, 'day'=>$i+2]) }}">
                                        {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                                    </a>
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color">
                            <td colspan="8">@lang('From Laban')</td>
                        </tr>
                        <tr>     
                            <td>@lang('Quantity used')</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $shankleesh['qty_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>     
                            <td>@lang('Quantity of salt added')</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $shankleesh['salt_added_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color tr-height">
                            <td colspan="8"></td>
                        </tr>
                        <tr>     
                            <td>@lang('Salt')</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $shankleesh['salt_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr>     
                            <td>@lang('Milk per Kg')</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $shankleesh['milk_'.$i]}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-height">     
                            @for ($i = 1; $i <= 8; $i++)
                                <td></td>
                            @endfor
                        </tr>
                        <tr class="tr-color tr-height">
                            <td colspan="8"></td>
                        </tr>
                        <tr class="tr-height">     
                            @for ($i = 1; $i <= 8; $i++)
                                <td></td>
                            @endfor
                        </tr>
                        <tr>     
                            <td>@lang('Final Quantity in kg')</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $shankleesh['final_qty_'.$i]}}
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
            background-color: rgb(123, 244, 43) !important; 
            color: white;
        }

        .tr-color {
            background-color: rgba(58, 244, 61, 0.76) !important; 
            text-align: center;
            color: white;
        }
        .tr-height {
            height: 35px;
        }
    </style>
@endsection
