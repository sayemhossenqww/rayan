<?php

namespace App\Http\Controllers;

use App\Models\Cheese;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class CheeseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $cheese = Cheese::search($request->search_query)->orderBy('order')->paginate(20);
        return view('cheeses.index', [
            'cheeses' => $cheese
        ]);
    }

    public function print(Request $request): View
    {
        $cheese = Cheese::search($request->search_query)->orderBy('order')->get();
        return view('cheeses.print', [
            'cheeses' => $cheese
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('cheeses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'order' => ['nullable', 'numeric', 'min:0']
        ]);

        $cheese = new Cheese();
        $cheese->name = $request->name;
        $cheese->order = $request->order;
        $cheese->manufacturing_date = $request->manufacturing_date;
        $cheese->evaporation_hours = $request->evaporation_hours;
        $cheese->quantity = $request->quantity;
        $cheese->unit = $request->unit;
        $cheese->save();

        return Redirect::back()->with("success", __("Created"));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cheese  $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cheese $cheese): RedirectResponse
    {
        $cheese->delete();
        return Redirect::back()->with("success", __("Deleted"));
    }

    public function edit(Cheese $cheese): View
    {
        return view("cheeses.edit", [
            'cheese' => $cheese,
        ]);
    }
    
    public function update(Request $request, Cheese $cheese)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'order' => ['nullable', 'numeric', 'min:0']
        ]);

        $cheese->name = $request->name;
        $cheese->order = $request->order;
        $cheese->manufacturing_date = $request->manufacturing_date;
        $cheese->evaporation_hours = $request->evaporation_hours;
        $cheese->quantity = $request->quantity;
        $cheese->unit = $request->unit;
        $cheese->save();

        return back()->with('success', __('Updated'));
    }
}