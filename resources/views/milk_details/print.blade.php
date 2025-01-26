@inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>@lang('Dairy Industry') – @lang('Cheeses and Labneh')</title>
        <style>
            @media print {
                body {
                    width: 100%;
                    margin: 0;
                    position: relative;
                    height: auto;
                    /* Needed to ensure long documents repeat backgrounds effectively */
                }
                /* Apply styles to the pseudo-element */
                body::before {
                    content: "";
                    position: fixed;
                    top: 0;
                    left: 15%;
                    width: 100vw;
                    height: 100vh;
                    background-image: url('/images/rayahen.png');
                    background-size: contain;
                    background-repeat: repeat-y;
                    opacity: 0.1; /* or adjust to your desired transparency level */
                    z-index: -1; /* Make sure it is behind the content */
                    pointer-events: none;
                }
                /* Ensure the table breaks over pages correctly */
                .content {
                    position: relative;
                    z-index: 1;
                    page-break-inside: avoid; /* Prevent page breaks inside content */
                }
            }
            .text-red {
                color: #ff0000;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div style="margin-bottom: 0.2rem;text-align: center !important;">
            <div style="text-align: left;">
                <h2>@lang('Dairy Industry') – @lang('Cheeses and Labneh')</h2>
            </div>
            <div style="display: flex; margin-bottom: 1.5rem; width: 100%;">
                <table style="border: 1px solid; width: 100%;">
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
                    <tbody>
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
                            <tr style="height: 20px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                            <tr style="height: 20px;">
                                <td colspan="8" style="background-color: brown;"></td>
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
