<?php

namespace App\Http\Controllers;

use App\Models\Shankleesh;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShankleeshController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity used',
        'salt_added' => 'Quantity of salt added',
        'salt' => 'Salt',
        'milk' => 'Milk per Kg',
        'final_qty' => 'Final Quantity in kg'
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
        
        return view('shankleesh.index', [
            'week' => $week,
            'year' => $year,
            'shankleesh' => $this->getShankleesh($year, $week),
            'fields1' => $this->FILEDS1
        ]);
    }

    public function edit(Shankleesh $shankleesh, string $day = '1'): View
    {
        return view("shankleesh.edit", [
            'shankleesh' => $shankleesh,
            'day' => $day,
            'fields1' => $this->FILEDS1
        ]);
    }

    public function update(Request $request, Shankleesh $shankleesh)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $shankleesh[$key.'_'.$request->day] = $request[$key];
        }
        $shankleesh->save();
        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('shankleesh.print', [
            'week' => $week,
            'year' => $year,
            'shankleesh' => $this->getShankleesh($year, $week),
            'fields1' => $this->FILEDS1
        ]);
    }

    private function getShankleesh($year, $week) : Shankleesh
    {
        $shankleesh =  Shankleesh::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($shankleesh == null) {
            $shankleesh = new Shankleesh();
            $shankleesh->year = $year;
            $shankleesh->week = $week;
            $shankleesh->save();
        }

        return $shankleesh;
    }
}