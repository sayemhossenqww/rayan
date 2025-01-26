@inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>{{ $staff->name }} </title>
    </head>

    <body>
        <div style="margin-bottom: 0.2rem;text-align: center !important;">
            <div style="text-align: left;">
                <h2>Name: {{$staff->name}}</h2>
            </div>
            <div style="display: flex; margin-bottom: 1.5rem; width: 100%;">
                <table style="border: 1px solid; width: 100%;">
                    <thead>
                        <tr>
                            <th>@lang('Day')</th>
                            <th>@lang('Date')</th>
                            <th>@lang('In')</th>
                            <th>@lang('Out')</th>
                            <th>@lang('Signature')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= $carbon::createFromDate($year, $month, 1)->endOfMonth()->format('d'); $i++)
                            <tr 
                                class={{$carbon::createFromDate($year, $month, $i)->dayName == 'Sunday' ? 'text-red' : ''}}
                            >
                                <td>
                                    {{ $carbon::createFromDate($year, $month, $i)->dayName }}
                                </td>
                                <td>{{ $i }} {{ $carbon::createFromDate($year, $month, $i)->format('M') }} {{ $carbon::createFromDate($year, $month, $i)->format('y') }}</td>
                                <td>{{$attendance['in_'.$i]}}</td>
                                <td>{{$attendance['out_'.$i]}}</td>
                                <td></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <style type="text/css">
            .text-red {
                color: #ff0000;
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
