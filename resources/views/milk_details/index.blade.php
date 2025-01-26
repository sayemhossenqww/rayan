@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('title', __('Milk Details'))

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Milk Details')</x-page-title>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="{{ route('milk_details.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ]) }}">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="{{ route('milk_details.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ]) }}">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="{{ route('milk_details.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ]) }}">Next Week</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
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
                                    {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
                                </td>
                            @endfor
                        </tr>
                        @foreach ($staffs as $staff)
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    {{ $staff->name }}<br/>
                                    Milk 1st Qty 
                                </td>
                                @for ($i = -1; $i < 6; $i++)
                                    <td>
                                        {{$milk_details[$staff->id]['1_qty_'.$i+2]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Temperature
                                </td>
                                @for ($i = -1; $i < 6; $i++)
                                    <td>
                                        {{$milk_details[$staff->id]['1_temperature_'.$i+2]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Water %
                                </td>
                                @for ($i = -1; $i < 6; $i++)
                                    <td>
                                        {{$milk_details[$staff->id]['1_water_'.$i+2]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    {{ $staff->name }}<br/>
                                    Milk 2nd Qty 
                                </td>
                                @for ($i = -1; $i < 6; $i++)
                                    <td>
                                        {{$milk_details[$staff->id]['2_qty_'.$i+2]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Temperature
                                </td>
                                @for ($i = -1; $i < 6; $i++)
                                    <td>
                                        {{$milk_details[$staff->id]['2_temperature_'.$i+2]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Water %
                                </td>
                                @for ($i = -1; $i < 6; $i++)
                                    <td>
                                        {{$milk_details[$staff->id]['2_water_'.$i+2]}}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td colspan="8" style="background-color: brown;"></td>
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
