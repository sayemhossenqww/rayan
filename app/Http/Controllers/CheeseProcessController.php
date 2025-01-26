<?php

namespace App\Http\Controllers;

use App\Models\CheeseProcess1;
use App\Models\CheeseProcess2;
use App\Models\DairyIndustry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheeseProcessController extends Controller
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
        
        return view('cheese_process.index', [
            'week' => $week,
            'year' => $year,
            'cheese' => $this->geCheeseProcess($year, $week)
        ]);
    }

    public function edit(CheeseProcess1 $cheese, string $day = '1'): View
    {
        return view("cheese_process.edit", [
            'cheese' => $cheese,
            'day' => $day
        ]);
    }

    public function update(Request $request, CheeseProcess1 $cheese)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2'],
            'qty' => ['nullable', 'string', 'min:0'],
            'milk_analyzer' => ['nullable', 'string', 'min:0'],
            'time_on' => ['nullable', 'string', 'min:0'],
            'time_off' => ['nullable', 'string', 'min:0'],
            'cooled_down' => ['nullable', 'string', 'min:0'],
            'rennet_qty' => ['nullable', 'string', 'min:0'],
            'added' => ['nullable', 'string', 'min:0'],
            'fermented' => ['nullable', 'string', 'min:0'],
            'cut' => ['nullable', 'string', 'min:0'],
            'balady_cheese_qty' => ['nullable', 'string', 'min:0'],
            'put_in_mold' => ['nullable', 'string', 'min:0'],
            'boiling_started_1' => ['nullable', 'string', 'min:0'],
            'boiling_started_2' => ['nullable', 'string', 'min:0'],
            'halloum_cheese_qty' => ['nullable', 'string', 'min:0'],
            'in_fridge' => ['nullable', 'string', 'min:0'],
            'akkwai_cheese_qty' => ['nullable', 'string', 'min:0'],
        ]);

        $cheese['qty_'.$request->day] = $request['qty'];
        $cheese['milk_analyzer_'.$request->day] = $request['milk_analyzer'];
        $cheese['time_on_'.$request->day] = $request['time_on'];
        $cheese['time_off_'.$request->day] = $request['time_off'];
        $cheese['cooled_down_'.$request->day] = $request['cooled_down'];
        $cheese['rennet_qty_'.$request->day] = $request['rennet_qty'];
        $cheese['added_'.$request->day] = $request['added'];
        $cheese['fermented_'.$request->day] = $request['fermented'];
        $cheese['cut_'.$request->day] = $request['cut'];
        $cheese['balady_cheese_qty_'.$request->day] = $request['balady_cheese_qty'];
        $cheese->save();

        $cheese2 = $cheese->cheese2;
        $cheese2['put_in_mold_'.$request->day] = $request['put_in_mold'];
        $cheese2['in_fridge_'.$request->day] = $request['in_fridge'];
        $cheese2['boiling_started_1_'.$request->day] = $request['boiling_started_1'];
        $cheese2['boiling_started_2_'.$request->day] = $request['boiling_started_2'];
        $cheese2['halloum_cheese_qty_'.$request->day] = $request['halloum_cheese_qty'];
        $cheese2['akkwai_cheese_qty_'.$request->day] = $request['akkwai_cheese_qty'];
        $cheese2->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('cheese_process.print', [
            'week' => $week,
            'year' => $year,
            'cheese' => $this->geCheeseProcess($year, $week)
        ]);
    }

    private function geCheeseProcess($year, $week) : CheeseProcess1
    {
        $cheese1 =  CheeseProcess1::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($cheese1 == null) {
            $cheese1 = new CheeseProcess1();
            $cheese1->year = $year;
            $cheese1->week = $week;
            $cheese1->save();

            $cheese2 = new CheeseProcess2();
            $cheese2->parent_id = $cheese1->id;
            $cheese2->year = $year;
            $cheese2->week = $week;
            $cheese2->save();
        }

        return $cheese1;
    }
}