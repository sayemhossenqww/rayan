@inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Serum based Dairy</title>
        <style>
            .text-red {
                color: rgb(238, 113, 63);
            }

            .tr-head {
                background-color: rgb(238, 113, 63) !important; 
                color: white;
            }

            .tr-color {
                background-color: rgba(244, 126, 87, 0.51) !important; 
                text-align: center;
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
                <h2>Dairy Industry – <span class="text-red">Serum based Dairy</span></h2>
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
                        @foreach ($fields1 as $key => $value)  
                            <tr>     
                                <td>{{ $value }}</td>
                                @for ($i = 1; $i <= 7; $i++)
                                    <td>
                                        {{ $serum[$key.'_'.$i]}}
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
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
