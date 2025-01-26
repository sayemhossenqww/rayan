@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Kishek'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Kishek')</x-page-title>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('kishek.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ]) }}">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('kishek.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('kishek.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
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
                                    <a href="{{ route('kishek.edit', ['kishek'=>$kishek, 'day'=>$i+2]) }}">
                                        {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                                    </a>
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Qty of laban in kg</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $kishek['kishek_'.$i]['laban_qty']}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Groats</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $kishek['kishek_'.$i]['groats']}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Salt </td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $kishek['kishek_'.$i]['salt']}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Current weight</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $kishek['kishek_'.$i]['current_weight']}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color">
                            <td colspan="8"></td>
                        </tr>
                        <tr>
                            <td>Breaking date </td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $kishek['kishek_'.$i]['date_view']}}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Cost of breaking </td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $kishek['kishek_'.$i]['cost_of_breaking']}}
                                </td>
                            @endfor
                        </tr>
                        <tr class="tr-color">
                            <td colspan="8"></td>
                        </tr>
                        @for ($j = 1; $j <= 9; $j++)
                            <tr>
                                <td>{{ $j }} - Labneh Added - Date</td>
                                @for ($i = 1; $i <= 7; $i++)
                                    <td>
                                        {{ $kishek->dateView($kishek['kishek_'.$i]['labneh_added_'.$j])}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td>Amount of Labneh Added</td>
                                @for ($i = 1; $i <= 7; $i++)
                                    <td>
                                        {{ $kishek['kishek_'.$i]['labneh_amount_'.$j]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td>Current weight</td>
                                @for ($i = 1; $i <= 7; $i++)
                                    <td>
                                        {{ $kishek['kishek_'.$i]['current_weight_'.$j]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr class="tr-color">
                                <td colspan="8"></td>
                            </tr>
                        @endfor
                        <tr>
                            <td>Final Quantity</td>
                            @for ($i = 1; $i <= 7; $i++)
                                <td>
                                    {{ $kishek['kishek_'.$i]['final_qty']}}
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
            background-color: rgb(242, 34, 20) !important; 
            color: white;
        }

        .tr-color {
            background-color: rgb(246, 27, 27) !important; 
        }
    </style>
@endsection
