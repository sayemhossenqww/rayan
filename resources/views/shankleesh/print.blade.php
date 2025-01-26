@inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Shankleesh Process</title>
        <style>
            .text-red {
                color: rgb(123, 244, 43);
            }

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
                height: 20px;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div style="margin-bottom: 0.2rem;text-align: center !important;" class="content">
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
                <h2>Dairy Industry – <span class="text-red">Shankleesh Process</span></h2>
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
                    <tbody class="border-top-0">
                        <tr>
                            <td>@lang('Date')</td>
                            @for ($i = -1; $i < 6; $i++)
                                <td>
                                    {{ $carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y') }}
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
    </body> 
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
