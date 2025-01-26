<?php

namespace App\Http\Controllers;

use App\Models\Kishek;
use App\Models\Kishek1;
use App\Models\Kishek2;
use App\Models\Kishek3;
use App\Models\Kishek4;
use App\Models\Kishek5;
use App\Models\Kishek6;
use App\Models\Kishek7;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class KishekController extends Controller
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
        
        return view('kishek.index', [
            'week' => $week,
            'year' => $year,
            'kishek' => $this->geKishek($year, $week)
        ]);
    }

    public function edit(Kishek $kishek, string $day = '1'): View
    {
        return view("kishek.edit", [
            'kishek' => $kishek,
            'day' => $day
        ]);
    }

    public function update(Request $request, Kishek $kishek)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2'],
            'laban_qty' => ['nullable', 'string', 'min:0'],
            'groats' => ['nullable', 'string', 'min:0'],
            'salt' => ['nullable', 'string', 'min:0']
        ]);

        $sub_kishek = $kishek['kishek_'.$request->day];

        $sub_kishek['laban_qty'] = $request['laban_qty'];
        $sub_kishek['groats'] = $request['groats'];
        $sub_kishek['salt'] = $request['salt'];
        $sub_kishek['current_weight'] = $request['current_weight'];
        $sub_kishek['breaking_date'] = $request['breaking_date'];
        $sub_kishek['cost_of_breaking'] = $request['cost_of_breaking'];
        for ($i = 1; $i <= 9 ; $i++) { 
            $sub_kishek['labneh_added_'.$i] = $request['labneh_added_'.$i];
            $sub_kishek['labneh_amount_'.$i] = $request['labneh_amount_'.$i];
            $sub_kishek['current_weight_'.$i] = $request['current_weight_'.$i];
        }
        $sub_kishek['final_qty'] = $request['final_qty'];
        $sub_kishek->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('kishek.print', [
            'week' => $week,
            'year' => $year,
            'kishek' => $this->geKishek($year, $week)
        ]);
    }

    private function geKishek($year, $week) : Kishek
    {
        $kishek =  Kishek::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($kishek == null) {
            $kishek = new Kishek();
            $kishek->year = $year;
            $kishek->week = $week;
            $kishek->save();

            $kishek1 = new Kishek1();
            $kishek1->parent_id = $kishek->id;
            $kishek1->year = $year;
            $kishek1->week = $week;
            $kishek1->save();

            $kishek2 = new Kishek2();
            $kishek2->parent_id = $kishek->id;
            $kishek2->year = $year;
            $kishek2->week = $week;
            $kishek2->save();

            $kishek3 = new Kishek3();
            $kishek3->parent_id = $kishek->id;
            $kishek3->year = $year;
            $kishek3->week = $week;
            $kishek3->save();

            $kishek4 = new Kishek4();
            $kishek4->parent_id = $kishek->id;
            $kishek4->year = $year;
            $kishek4->week = $week;
            $kishek4->save();

            $kishek5 = new Kishek5();
            $kishek5->parent_id = $kishek->id;
            $kishek5->year = $year;
            $kishek5->week = $week;
            $kishek5->save();

            $kishek6 = new Kishek6();
            $kishek6->parent_id = $kishek->id;
            $kishek6->year = $year;
            $kishek6->week = $week;
            $kishek6->save();

            $kishek7 = new Kishek7();
            $kishek7->parent_id = $kishek->id;
            $kishek7->year = $year;
            $kishek7->week = $week;
            $kishek7->save();
        }
        return $kishek;
    }
}