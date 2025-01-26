<?php

namespace App\Http\Controllers;

use App\Models\Margarine;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MargarineController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity of Laban',
        'put_on_fire' => 'Put on fire @',
        'butter_qty' => 'Quantity of Butter',
        'jar_qty_1' => 'Quantity of 1 kg Jar',
        'jar_qty_2' => 'Quantity of 0.5 kg Jar',
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
        
        return view('margarine.index', [
            'week' => $week,
            'year' => $year,
            'margarine' => $this->geMargarine($year, $week),
            'fields1' => $this->FILEDS1
        ]);
    }

    public function edit(Margarine $margarine, string $day = '1'): View
    {
        return view("margarine.edit", [
            'margarine' => $margarine,
            'day' => $day,
            'fields1' => $this->FILEDS1
        ]);
    }

    public function update(Request $request, Margarine $margarine)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $margarine[$key.'_'.$request->day] = $request[$key];
        }
        $margarine->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('margarine.print', [
            'week' => $week,
            'year' => $year,
            'margarine' => $this->geMargarine($year, $week),
            'fields1' => $this->FILEDS1
        ]);
    }

    private function geMargarine($year, $week) : Margarine
    {
        $margarine =  Margarine::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($margarine == null) {
            $margarine = new Margarine();
            $margarine->year = $year;
            $margarine->week = $week;
            $margarine->save();
        }

        return $margarine;
    }
}