<?php

namespace App\Http\Controllers;

use App\Models\Tomme1;
use App\Models\Tomme2;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TommeController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity of Milk',
        'on_fire' => 'On Fire @',
        'off_fire' => 'Off of Fire @',
        'cool_down' => 'Cooled down @',
        'temperature_1' => 'Temperature',
        'ferment_added' => 'Added Ferment @',
        'temperature_2' => 'Temperature',
        'ferment_qty' => 'Quantity of Ferment',
        'pressured' => 'Pressured @',
        'breaking' => 'On Fire + breaking @',
        'off_of_fire' => 'Off of Fire @',
    ];

    public $FILEDS2 = [
        'temperature' => 'Temperature',
        'duration' => 'Duration',
        'put_in_mold' => 'Put in mold @',
        'date' => 'Date: ',
        'time' => 'Time: ',
        'water_salt' => 'Water Quantity: Salt Quantity: ',
        'duration_in_water' => 'Duration in Water: ',
        'notes' => 'Notes: ',
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
        
        // dd($this->getTomme($year, $week));
        return view('tomme.index', [
            'week' => $week,
            'year' => $year,
            'tomme' => $this->getTomme($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function edit(Tomme1 $tomme, string $day = '1'): View
    {
        return view("tomme.edit", [
            'tomme' => $tomme,
            'day' => $day,
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function update(Request $request, Tomme1 $tomme)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $tomme[$key.'_'.$request->day] = $request[$key];
        }
        $tomme->save();

        $tomme2 = $tomme->tomme2;
        foreach ($this->FILEDS2 as $key => $value) {
            $tomme2[$key.'_'.$request->day] = $request[$key];
        }
        $tomme2->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('tomme.print', [
            'week' => $week,
            'year' => $year,
            'tomme' => $this->getTomme($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    private function getTomme($year, $week) : Tomme1
    {
        $tomme1 =  Tomme1::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($tomme1 == null) {
            $tomme1 = new Tomme1();
            $tomme1->year = $year;
            $tomme1->week = $week;
            $tomme1->save();

            $tomme2 = new Tomme2();
            $tomme2->parent_id = $tomme1->id;
            $tomme2->save();
        }

        return $tomme1;
    }
}