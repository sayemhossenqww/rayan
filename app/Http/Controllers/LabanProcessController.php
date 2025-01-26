<?php

namespace App\Http\Controllers;

use App\Models\LabanProcess1;
use App\Models\LabanProcess2;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LabanProcessController extends Controller
{
    public $FILEDS1 = [
        'qty' => 'Quantity of milk',
        'water' => 'Milk Analyzer / Water %',
        'on_fire' => 'On fire @',
        'off_fire' => 'Off fire @',
        'cooled_down' => 'Cooling time @',
        'laban_added' => 'Laban Added @',
        'laban_added_qty' => 'Qty of Laban Added',
        'ready' => 'Ready @',
        'test' => 'P.H. test',
        'notes' => 'Notes'
    ];

    public $FILEDS2 = [
        'bulk_qty' => 'Quantity of Bulk kg',
        'glass_qty' => 'Quantity of glass-cup',
        'bucket_1_qty' => 'Quantity of 1 kg bucket',
        'bucket_2_qty' => 'Quantity of 2 kg bucket',
        'bucket_5_qty' => 'Quantity of 5 kg bucket',
        'put_in_fridge' => 'Put in Fridge @',
        'final_qty' => 'Final Quantity of Laben in kg'
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
        
        return view('laban_process.index', [
            'week' => $week,
            'year' => $year,
            'laban' => $this->geLabanProcess($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function edit(LabanProcess1 $laban, string $day = '1'): View
    {
        return view("laban_process.edit", [
            'laban' => $laban,
            'day' => $day,
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    public function update(Request $request, LabanProcess1 $laban)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2']
        ]);

        foreach ($this->FILEDS1 as $key => $value) {
            $laban[$key.'_'.$request->day] = $request[$key];
        }
        $laban->save();

        $laban2 = $laban->laban2;
        foreach ($this->FILEDS2 as $key => $value) {
            $laban2[$key.'_'.$request->day] = $request[$key];
        }
        $laban2->save();

        return back()->with('success', __('Updated'));
    }

    public function print(?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        
        return view('laban_process.print', [
            'week' => $week,
            'year' => $year,
            'laban' => $this->geLabanProcess($year, $week),
            'fields1' => $this->FILEDS1,
            'fields2' => $this->FILEDS2
        ]);
    }

    private function geLabanProcess($year, $week) : LabanProcess1
    {
        $laban1 =  LabanProcess1::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->first();

        if ($laban1 == null) {
            $laban1 = new LabanProcess1();
            $laban1->year = $year;
            $laban1->week = $week;
            $laban1->save();

            $laban2 = new LabanProcess2();
            $laban2->parent_id = $laban1->id;
            $laban2->save();
        }

        return $laban1;
    }
}