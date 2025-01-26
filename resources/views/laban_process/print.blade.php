@inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Laban Process</title>
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
                color: rgb(217, 81, 241);
            }

            .tr-head {
                background-color: rgb(235, 14, 205) !important; 
                color: white;
            }

            .tr-color {
                background-color: rgb(71, 5, 92) !important; 
                height: 10px;
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
                <h2>Dairy Industry – <span class="text-red">Laban Process</span></h2>
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
                                        {{ $laban[$key.'_'.$i]}}
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                        <tr class="tr-color">
                            <td colspan="8"></td>
                        </tr>
                        @foreach ($fields2 as $key => $value)        
                            <tr>
                                <td>{{ $value }}</td>
                                @for ($i = 1; $i <= 7; $i++)
                                    <td>
                                        {{ $laban->laban2[$key.'_'.$i]}}
                                    </td>
                                @endfor
                            </tr>
                            @if ($key == 'put_in_fridge' || $key == 'final_qty')
                                <tr class="tr-color">
                                    <td colspan="8"></td>
                                </tr>
                            @endif
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
