<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Traits\Availability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LineController extends Controller
{

    use Availability;
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {

        return view("lines.index");
    }

    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // $category = Category::all();
        return view("lines.create");
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Line $line): View
    {
        return view("lines.edit", [
            'line' => $line
        ]);
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Line $line): RedirectResponse
    {
        $line->delete();
        return Redirect::back()->with("success", __("Deleted"));
    }

    /**
     * Show resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'location' => ['required', 'string'],
            'zoom' => ['required', 'string'],
            'customer_name' => ['required', 'string'],
        ]);

        $line = Line::create([
            'location' => $request->location,
            'zoom' => $request->zoom,
            'customer_name' => $request->customer_name,
        ]);

        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * update resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Line $line): RedirectResponse
    {
        $request->validate([
            'location' => ['required', 'string'],
            'zoom' => ['required', 'string'],
            'customer_name' => ['required', 'string'],
        ]);

        $line->update([
            'location' => $request->location,
            'zoom' => $request->zoom,
            'customer_name' => $request->customer_name,
        ]);
        return Redirect::back()->with("success", __("Updated"));
    }
}