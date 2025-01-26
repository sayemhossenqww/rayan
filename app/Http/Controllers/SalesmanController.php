<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Salesman;
use App\Traits\Availability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SalesmanController extends Controller
{

    use Availability;
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {

        return view("salesmen.index");
    }

    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $category = Category::all();
        return view("salesmen.create", [
            'categories' => $category,
        ]);
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Salesman $salesman): View
    {
        $category = Category::all();
        return view("salesmen.edit", [
            'salesman' => $salesman,
            'categories' => $category
        ]);
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Salesman $salesman): RedirectResponse
    {
        $salesman->delete();
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
            'salesman_name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'stock' => ['required', 'string'],
            'retail_price' => ['required', 'numeric'],
        ]);

        $category = Salesman::create([
            'salesman_name' => $request->salesman_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'stock' => $request->stock,
            'retail_price' => $request->retail_price,
        ]);

        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * update resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Salesman $salesman): RedirectResponse
    {
        $request->validate([
            'salesman_name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'stock' => ['required', 'string'],
            'retail_price' => ['required', 'numeric'],
        ]);

        $salesman->update([
            'salesman_name' => $request->salesman_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'stock' => $request->stock,
            'retail_price' => $request->retail_price,
        ]);
        return Redirect::back()->with("success", __("Updated"));
    }
}