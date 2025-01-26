<?php

namespace App\Http\Controllers;

use App\Models\Serum;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SerumController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity of serum used',
        'qty_of' => 'Quantity of ',
        'time' => 'Time',
        'note' => 'Note',
        'areesheh_qty' => 'Areesheh Quantity',
        'ricotta_qty' => 'Ricotta Quantity',
        'cream_qty' => 'Double Cream Quantity',
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
        
        return view('serum.index', [
            'week' => $week,
            'year' => $year,
            'serum' => $this->getSerum($year, $week),
            'fields1' => $this->FILEDS1
        ]);
    }

    public function edit(Serum $serum, string $day = '1'): View
    {
        return view("serum.edit", [
            'serum' => $serum,
            'day' => $day,
            'fields1' => $this->FILEDS1
        ]);
    }

    public function update(Request $request, Serum $serum)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $serum[$key.'_'.$request->day] = $request[$key];
        }
        $serum->save();
        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('serum.print', [
            'week' => $week,
            'year' => $year,
            'serum' => $this->getSerum($year, $week),
            'fields1' => $this->FILEDS1
        ]);
    }

    private function getSerum($year, $week) : Serum
    {
        $serum =  Serum::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($serum == null) {
            $serum = new Serum();
            $serum->year = $year;
            $serum->week = $week;
            $serum->save();
        }

        return $serum;
    }
}