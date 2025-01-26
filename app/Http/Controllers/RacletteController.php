<?php

namespace App\Http\Controllers;

use App\Models\Raclette1;
use App\Models\Raclette2;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RacletteController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity of Milk',
        'on_fire' => 'On Fire @',
        'off_fire' => 'Off of Fire @',
        'temperature_1' => 'Temperature',
        'cool_down' => 'Cooled down @',
        'ferment_added' => 'Added Ferment @',
        'temperature_2' => 'Temperature',
        'pressured' => 'Pressured @',
        'breaking' => 'On Fire + breaking @',
        'stirring_until' => 'Stirring until @',
        'serum_extracted' => 'Serum extracted @'
    ];

    public $FILEDS2 = [
        'serum_qty' => 'Serum’s quantity',
        'water' => 'Water Quantity added :',
        'fire_on' => 'Stirring on fire From: Till:',
        'put_in_mold' => 'Put in mold @',
        'stirring1' => 'Stirring @',
        'stirring2' => 'Stirring @',
        'stirring3' => 'Stirring @',
        'date' => 'Date: ',
        'water_vs_salt' => 'Quantity of Water: vs Quantity of Salt:',
        'notes' => 'Notes:',
        'final_qty' => 'Final Quantity: '
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
        
        // dd($this->geRaclette($year, $week));
        return view('raclette.index', [
            'week' => $week,
            'year' => $year,
            'raclette' => $this->geRaclette($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function edit(Raclette1 $raclette, string $day = '1'): View
    {
        return view("raclette.edit", [
            'raclette' => $raclette,
            'day' => $day,
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function update(Request $request, Raclette1 $raclette)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $raclette[$key.'_'.$request->day] = $request[$key];
        }
        $raclette->save();

        $raclette2 = $raclette->raclette2;
        foreach ($this->FILEDS2 as $key => $value) {
            $raclette2[$key.'_'.$request->day] = $request[$key];
        }
        $raclette2->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('raclette.print', [
            'week' => $week,
            'year' => $year,
            'raclette' => $this->geRaclette($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    private function geRaclette($year, $week) : Raclette1
    {
        $raclette1 =  Raclette1::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($raclette1 == null) {
            $raclette1 = new Raclette1();
            $raclette1->year = $year;
            $raclette1->week = $week;
            $raclette1->save();

            $raclette2 = new Raclette2();
            $raclette2->parent_id = $raclette1->id;
            $raclette2->save();
        }

        return $raclette1;
    }
}