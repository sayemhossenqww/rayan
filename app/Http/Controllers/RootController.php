<?php

namespace App\Http\Controllers;

use App\Models\Root;
use App\Traits\Availability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RootController extends Controller
{

    use Availability;
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {

        return view("roots.index");
    }

    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // $category = Category::all();
        return view("roots.create");
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Root $root): View
    {
        return view("roots.edit", [
            'root' => $root
        ]);
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Root $root): RedirectResponse
    {
        $root->delete();
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
            'root_name' => ['required', 'string'],
            'area_name' => ['required', 'string'],
            'city_name' => ['required', 'string'],
        ]);

        $root = Root::create([
            'root_name' => $request->root_name,
            'area_name' => $request->area_name,
            'city_name' => $request->city_name,
        ]);

        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * update resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Root $root): RedirectResponse
    {
        $request->validate([
            'root_name' => ['required', 'string'],
            'area_name' => ['required', 'string'],
            'city_name' => ['required', 'string'],
        ]);

        $root->update([
            'root_name' => $request->root_name,
            'area_name' => $request->area_name,
            'city_name' => $request->city_name,
        ]);
        return Redirect::back()->with("success", __("Updated"));
    }
}