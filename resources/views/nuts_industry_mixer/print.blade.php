inject('carbon', 'Carbon\Carbon')
<html lang="en" dir="ltr">
    <head>
        <title>Nuts Industry Mixer</title>
        <style>
            @media print {
                body {
                    width: 100%;
                    margin: 0;
                    position: relative;
                    height: auto;
                }
                body::before {
                    content: "";
                    position: fixed;
                    top: 0;
                    left: 15%;
                    width: 100vw;
                    height: 100vh;
                    background-image: url('/images/meet_logo.png');
                    background-size: contain;
                    background-repeat: repeat-y;
                    opacity: 0.1;
                    z-index: -1;
                    pointer-events: none;
                }
                .content {
                    position: relative;
                    z-index: 1;
                    page-break-inside: avoid;
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
                <h2>Mouneh Industries</h2>
            </div>
            <div style="display: flex; margin-bottom: 1.5rem; width: 100%;">
                <table style="border: 1px solid; width: 100%;">
                    <thead>
                        <tr>
                            <th>@lang('Seq')</th>
                            <th>@lang('Item Description')</th>
                            <th class="text-red">@lang('Sunday')</th>
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
                            <td></td>
                            <td style="text-align: right;">Date:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($mounehIndustries as $mounehIndustry)
                            <tr>
                                <td>{{ $mounehIndustry->id }}</td>
                                <td>{{ $mounehIndustry->type_of_nuts }} - fruit/vagetables {{ $mounehIndustry->quantity_of_pistachio}} - sugar/salt  {{ $mounehIndustry->quantity_of_sugar_salt }} - Acid {{ $mounehIndustry->quantity_of_acid }} - Glass Used? {{ $mounehIndustry->glass_used ? 'Yes' : 'No' }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
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