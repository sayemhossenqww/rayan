@inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Cheese Process</title>
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
                color: rgb(33, 236, 80);
            }

            .tr-head {
                background-color: rgb(33, 236, 80) !important; 
                color: white;
            }

            .tr-color {
                background-color: rgb(246, 213, 141) !important; 
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
            <div style="text-align: left;">
                <h2>Dairy Industry – <span class="text-red">Cheese Process</span></h2>
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
                    <tbody class="border-top-0" style="page-break-before: always;">
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
    </body> 
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
