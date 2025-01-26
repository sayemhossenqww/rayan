<?php

namespace App\Http\Controllers;

use App\Models\GoudaRegular1;
use App\Models\GoudaRegular2;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GoudaRegularController extends Controller
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
        
        return view('gouda_regular.index', [
            'week' => $week,
            'year' => $year,
            'regular' => $this->geGoudaRegular($year, $week)
        ]);
    }

    public function edit(GoudaRegular1 $regular, string $day = '1'): View
    {
        return view("gouda_regular.edit", [
            'regular' => $regular,
            'day' => $day
        ]);
    }

    public function update(Request $request, GoudaRegular1 $regular)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2'],
            'qty' => ['nullable', 'string', 'min:0'],
            'time_on' => ['nullable', 'string', 'min:0'],
            'time_off' => ['nullable', 'string', 'min:0']
        ]);

        $regular['qty_'.$request->day] = $request['qty'];
        $regular['time_on_'.$request->day] = $request['time_on'];
        $regular['time_off_'.$request->day] = $request['time_off'];
        $regular['cooled_down_'.$request->day] = $request['cooled_down'];
        $regular['ferment_added_'.$request->day] = $request['ferment_added'];
        $regular['ferment_added_qty_'.$request->day] = $request['ferment_added_qty'];
        $regular['pressured_'.$request->day] = $request['pressured'];
        $regular['temperature_'.$request->day] = $request['temperature'];
        $regular['fire_cut_'.$request->day] = $request['fire_cut'];
        $regular['water_temperature_'.$request->day] = $request['water_temperature'];
        $regular['serum_removed_'.$request->day] = $request['serum_removed'];
        $regular->save();

        $regular2 = $regular->regular2;
        $regular2['put_in_water_'.$request->day] = $request['put_in_water'];
        $regular2['in_mold_'.$request->day] = $request['in_mold'];
        $regular2['date_'.$request->day] = $request['date'];
        $regular2['water_'.$request->day] = $request['water'];
        $regular2['salt_'.$request->day] = $request['salt'];
        $regular2['lancienne_qty_'.$request->day] = $request['lancienne_qty'];
        $regular2['reqular_qty_'.$request->day] = $request['reqular_qty'];
        $regular2->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('gouda_regular.print', [
            'week' => $week,
            'year' => $year,
            'regular' => $this->geGoudaRegular($year, $week)
        ]);
    }

    private function geGoudaRegular($year, $week) : GoudaRegular1
    {
        $regular1 =  GoudaRegular1::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($regular1 == null) {
            $regular1 = new GoudaRegular1();
            $regular1->year = $year;
            $regular1->week = $week;
            $regular1->save();

            $regular2 = new GoudaRegular2();
            $regular2->parent_id = $regular1->id;
            $regular2->year = $year;
            $regular2->week = $week;
            $regular2->save();
        }

        return $regular1;
    }
}