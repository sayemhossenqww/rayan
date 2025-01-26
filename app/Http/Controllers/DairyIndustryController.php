<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\DairyIndustry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DairyIndustryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, ?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('dairy_industry.index', [
            'week' => $week,
            'year' => $year,
            'dairy_industry' => $this->getDairyIndustry($year, $week)
        ]);
    }

    public function edit(DairyIndustry $dairy, string $day = '1'): View
    {
        return view("dairy_industry.edit", [
            'dairy' => $dairy,
            'day' => $day
        ]);
    }

    public function update(Request $request, DairyIndustry $dairy)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2'],
            'qty' => ['nullable', 'string', 'min:0'],
            'time_fire' => ['nullable', 'string', 'min:0'],
            'detail_1' => ['nullable', 'string', 'min:0'],
            'detail_2' => ['nullable', 'string', 'min:0'],
            'cream_qty' => ['nullable', 'string', 'min:0'],
            'cerak_qty' => ['nullable', 'string', 'min:0'],
            'ricotta_qty' => ['nullable', 'string', 'min:0']
        ]);

        $dairy['qty_'.$request->day] = $request['qty'];
        $dairy['time_fire_'.$request->day] = $request['time_fire'];
        $dairy['detail_1_'.$request->day] = $request['detail_1'];
        $dairy['detail_2_'.$request->day] = $request['detail_2'];
        $dairy['cream_qty_'.$request->day] = $request['cream_qty'];
        $dairy['cerak_qty_'.$request->day] = $request['cerak_qty'];
        $dairy['ricotta_qty_'.$request->day] = $request['ricotta_qty'];
        $dairy->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('dairy_industry.print', [
            'week' => $week,
            'year' => $year,
            'dairy_industry' => $this->getDairyIndustry($year, $week)
        ]);
    }

    private function getDairyIndustry($year, $week) : DairyIndustry
    {
        $detail =  DairyIndustry::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($detail == null) {
            $detail = new DairyIndustry();
            $detail->year = $year;
            $detail->week = $week;
            $detail->save();
        }

        return $detail;
    }
}