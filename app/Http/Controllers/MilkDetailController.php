<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\MilkDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MilkDetailController extends Controller
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
        $staffs = Staff::orderBy('order')->paginate(20);
        $milk_details = [];

        foreach ($staffs as $key => $value) {
            $milk_details[$value->id] = $value->getMilkDetail($year, $week);
        }
        
        return view('milk_details.index', [
            'staffs' => $staffs,
            'week' => $week,
            'year' => $year,
            'milk_details' => $milk_details
        ]);
    }

    public function update(Request $request, MilkDetail $detail)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2'],
            '1_qty' => ['nullable', 'string', 'min:0'],
            '1_temperature' => ['nullable', 'string', 'min:0'],
            '1_water' => ['nullable', 'string', 'min:0'],
            '2_qty' => ['nullable', 'string', 'min:0'],
            '2_temperature' => ['nullable', 'string', 'min:0'],
            '2_water' => ['nullable', 'string', 'min:0']
        ]);

        $detail['1_qty_'.$request->day] = $request['1_qty'];
        $detail['1_temperature_'.$request->day] = $request['1_temperature'];
        $detail['1_water_'.$request->day] = $request['1_water'];
        $detail['2_qty_'.$request->day] = $request['2_qty'];
        $detail['2_temperature_'.$request->day] = $request['2_temperature'];
        $detail['2_water_'.$request->day] = $request['2_water'];
        $detail->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        $staffs = Staff::orderBy('order')->paginate(20);
        $milk_details = [];

        foreach ($staffs as $key => $value) {
            $milk_details[$value->id] = $value->getMilkDetail($year, $week);
        }
        
        return view('milk_details.print', [
            'staffs' => $staffs,
            'week' => $week,
            'year' => $year,
            'milk_details' => $milk_details
        ]);
    }
}