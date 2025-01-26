<?php

namespace App\Http\Controllers;

use App\Models\LabnehProcess1;
use App\Models\LabnehProcess2;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LabnehProcessController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity of Laban Regular – w/out fat',
        'put_in_bag' => 'Put in bag @',
        'date_off_bag' => 'Date off of bag',
        'regular_qty' => 'Quantity for regular',
        'ball_process_qty' => 'Quantity for ball process',
        'final_qty' => 'Final Quantity',
    ];

    public $FILEDS2 = [
        'falavour_reg_qty_1' => 'Flavour 1 – regular final quantity',
        'final_qty_1' => 'Final Quantity',
        'falavour_reg_qty_2' => 'Flavour 2 – zaatar  final quantity',
        'final_qty_2' => 'Final Quantity',
        'falavour_reg_qty_3' => 'Flavour 3 – chili  final quantity',
        'final_qty_3' => 'Final Quantity',
        'notes' => 'Notes'
    ];
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
        
        // dd($this->geLabnehProcess($year, $week));
        return view('labneh_process.index', [
            'week' => $week,
            'year' => $year,
            'labneh' => $this->geLabnehProcess($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function edit(LabnehProcess1 $labneh, string $day = '1'): View
    {
        return view("labneh_process.edit", [
            'labneh' => $labneh,
            'day' => $day,
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function update(Request $request, LabnehProcess1 $labneh)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $labneh[$key.'_'.$request->day] = $request[$key];
        }
        $labneh->save();

        $labneh2 = $labneh->labneh2;
        foreach ($this->FILEDS2 as $key => $value) {
            $labneh2[$key.'_'.$request->day] = $request[$key];
        }
        $labneh2->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('labneh_process.print', [
            'week' => $week,
            'year' => $year,
            'labneh' => $this->geLabnehProcess($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    private function geLabnehProcess($year, $week) : LabnehProcess1
    {
        $labneh1 =  LabnehProcess1::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($labneh1 == null) {
            $labneh1 = new LabnehProcess1();
            $labneh1->year = $year;
            $labneh1->week = $week;
            $labneh1->save();

            $labneh2 = new LabnehProcess2();
            $labneh2->parent_id = $labneh1->id;
            $labneh2->save();
        }

        return $labneh1;
    }
}