<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Root;
use App\Models\CoffeeBag;
use App\Traits\Availability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ManupackController extends Controller
{

    use Availability;
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {

        return view("manupack.index");
    }

    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function products(Request $request, Category $category): View
    {
        $products = $category->products()->search($request->search_query)->latest()->paginate(20);

        return view("categories.products", [
            'category' => $category,
            'products' => $products,
        ]);
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // $category = Category::all();
        return view("manupack.create");
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function edit(CoffeeBag $coffee_bag): View
    {
        return view("manupack.edit", [
            'coffee_bag' => $coffee_bag
        ]);
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CoffeeBag $coffee_bag): RedirectResponse
    {
        $coffee_bag->delete();
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
            'total_amount_hidden' => ['required', 'integer'],
        ]);
        $bagType = $request->bag_type;
        $bbag_num = 0;
        $sbag_num = 0;

        if ($bagType === '400g-bag')
            $bbag_num = $request->nob;
        else
            $sbag_num = $request->nob;

        $category = CoffeeBag::create([
            'product_type' => 'Coffee',
            'bbag_num' => $request->bbag_num,
            'jar_num' => $request->jar_num,
            'total_amount' => $request->total_amount_hidden,
            'bigcon_num' => $bbag_num,
            'smallcon_num' => $sbag_num,
        ]);

        if ($request->has('image')) {
            $category->updateImage($request->image);
        }

        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * update resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CoffeeBag $coffee_bag): RedirectResponse
    {
        $request->validate([
            'total_amount_hidden' => ['required', 'integer'],
        ]);

        $bagType = $request->bag_type;
        $bbag_num = 0;
        $sbag_num = 0;

        if ($bagType === '400g-bag')
            $bbag_num = $request->nob;
        else
            $sbag_num = $request->nob;

        $coffee_bag->update([
            'bbag_num' => $request->bbag_num,
            'jar_num' => $request->jar_num,
            'total_amount' => $request->total_amount_hidden,
            'bigcon_num' => $bbag_num,
            'smallcon_num' => $sbag_num,
        ]);
        return Redirect::back()->with("success", __("Updated"));
    }
}