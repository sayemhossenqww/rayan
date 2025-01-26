<?php

namespace App\Http\Controllers;

use App\Models\LeComte1;
use App\Models\LeComte2;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LeComteController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity of Milk',
        'on_fire' => 'On Fire @',
        'off_fire' => 'Off of Fire @',
        'cool_down' => 'Cooled down @ ',
        'ferment_added' => 'Ferment Added @',
        'ferment_added_qty' => 'Quantity of Ferment added',
        'pressured' => 'Pressured @',
        'cut' => 'Cut @'
    ];

    public $FILEDS2 = [
        'on_fire' => 'On Fire @',
        'temperature' => 'Temperature',
        'put_in_mold' => 'Put in Mold @',
        'water_vs_salt' => 'Quantity of Water: vs Quantity of Salt:',
        'final_qty' => 'Final Quantity in pieces',
        'of_comte' => '# of Comte',
        'of_comtesse' => '# of Comtesse'
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
        
        // dd($this->geLeComte($year, $week));
        return view('comte.index', [
            'week' => $week,
            'year' => $year,
            'comte' => $this->geLeComte($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function edit(LeComte1 $comte, string $day = '1'): View
    {
        return view("comte.edit", [
            'comte' => $comte,
            'day' => $day,
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function update(Request $request, LeComte1 $comte)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $comte[$key.'_'.$request->day] = $request[$key];
        }
        $comte->save();

        $comte2 = $comte->comte2;
        foreach ($this->FILEDS2 as $key => $value) {
            $comte2[$key.'_'.$request->day] = $request[$key];
        }
        $comte2->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('comte.print', [
            'week' => $week,
            'year' => $year,
            'comte' => $this->geLeComte($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    private function geLeComte($year, $week) : LeComte1
    {
        $comte1 =  LeComte1::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($comte1 == null) {
            $comte1 = new LeComte1();
            $comte1->year = $year;
            $comte1->week = $week;
            $comte1->save();

            $comte2 = new LeComte2();
            $comte2->parent_id = $comte1->id;
            $comte2->save();
        }

        return $comte1;
    }
}