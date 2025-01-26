@inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Cerak, Double Cream & Ricotta Process</title>
    </head>

    <body>
        <div style="margin-bottom: 0.2rem;text-align: center !important;">
            @if ($settings->logo)
                <div style="padding-right: 1rem;padding-left: 1rem;margin-bottom: 0.5rem;">
                    {!! $settings->logo  !!}
                </div>
            @else
                @if ($settings->storeName)
                    <div style="font-size: 1.50rem;">{{ $settings->storeName }}</div>
                @endif
            @endif
            <div style="text-align: left;">
                <h2>Dairy Industry – <span class="text-red">Cerak, Double Cream & Ricotta Process</span></h2>
            </div>
            <div style="display: flex; margin-bottom: 1.5rem; width: 100%;">
                <table style="border: 1px solid; width: 100%;">
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
                    <tbody>
                        <tr>
                            <td>@lang('Date')</td>
                            @for ($i = -1; $i < 6; $i++)
                                <td>
                                    {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
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
        <style type="text/css">
            .text-red {
                color: #ff0000;
            }

            .tr-head {
                background-color: red !important; 
                color: white;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
        </style>
    </body> 
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
