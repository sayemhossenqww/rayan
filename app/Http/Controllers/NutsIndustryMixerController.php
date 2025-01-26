<?php

namespace App\Http\Controllers;

use App\Models\NutsIndustryMixer;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Product;
use App\Http\Requests\StoreNutsIndustryMixerRequest;
use App\Http\Requests\UpdateNutsIndustryMixerRequest;
use App\Traits\Availability;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Resources\ProductSelectResourceCollection;

class NutsIndustryMixerController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $mounehIndustries = NutsIndustryMixer::search($request->search_query)->orderBy('created_at', 'desc')->paginate(20);
        return view('nuts_industry_mixer.index', [
            'mounehIndustries' => $mounehIndustries
        ]);
    }

    public function print(Request $request): View
    {
        $mounehIndustries = NutsIndustryMixer::search($request->search_query)->orderBy('created_at', 'desc')->get();
        return view('nuts_industry_mixer.print', [
            'mounehIndustries' => $mounehIndustries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        
         // Fetch the category where name is 'Nuts Industry Mixer'
        $mounehCategory = Category::where('name', 'Nuts Industry Mixer')->first();
    
        // Handle case if 'Nuts Industry Mixer' category is not found
        if (!$mounehCategory) {
            abort(404, 'Nuts Industry Mixer category not found.');
        }
        
        // Default to false for a new Mouneh Industry (no product associated yet)
        $isNextPhaseChecked = false;
   
        return view("nuts_industry_mixer.create", [
            'category' => $mounehCategory, // Pass the 'mouneh' category
             'isNextPhaseChecked' => $isNextPhaseChecked,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMounehIndustryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNutsIndustryMixerRequest $request): RedirectResponse
    {
        $mounehIndustry = new NutsIndustryMixer();
        $mounehIndustry->type_of_nuts = $request->type_of_nuts;
        $mounehIndustry->quantity_of_pistachio = $request->quantity_of_pistachio;
        $mounehIndustry->quantity_of_regular_cashew = $request->quantity_of_regular_cashew;
        $mounehIndustry->quantity_of_smoked_cashew = $request->quantity_of_smoked_cashew;
        $mounehIndustry->quantity_of_hazelnut = $request->quantity_of_hazelnut;
        $mounehIndustry->quantity_of_regular_almond = $request->quantity_of_regular_almond;
        $mounehIndustry->quantity_of_smoked_almond = $request->quantity_of_smoked_almond;
        $mounehIndustry->quantity_of_white_seed = $request->quantity_of_white_seed;
        $mounehIndustry->quantity_of_freekeh_almond = $request->quantity_of_freekeh_almond;
        // $mounehIndustry->quantity_of_sugar_salt = $request->quantity_of_sugar_salt;
        // $mounehIndustry->quantity_of_acid = $request->quantity_of_acid;
        // $mounehIndustry->glass_used = $request->glass_used;
        $mounehIndustry->final_quantity = $request->final_quantity;
        
        // Check if the "next_phase" checkbox is checked, and create a Product
        if ($request->next_phase) {

            $validatedProductData = $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'wholesale_price' => ['nullable', 'numeric', 'min:0'],
                'box_price' => ['nullable', 'numeric', 'min:0'],
                'unit_price' => ['nullable', 'numeric', 'min:0'],
                'cost' => ['nullable', 'numeric', 'min:0'],
                'sort_order' => ['nullable', 'numeric', 'min:0'],
                'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
                'description' => ['nullable', 'string', 'max:2000'],
                'box_barcode' => ['nullable', 'string', 'max:43'],
                'unit_barcode' => ['nullable', 'string', 'max:43'],
                'superdealer_barcode' => ['nullable', 'string', 'max:43'],
                'wholesale_barcode' => ['nullable', 'string', 'max:43'],
                'box_sku' => ['nullable', 'string', 'max:64'],
                'unit_sku' => ['nullable', 'string', 'max:64'],
                'superdealer_sku' => ['nullable', 'string', 'max:64'],
                'wholesale_sku' => ['nullable', 'string', 'max:64'],
                'status' => ['required', 'string'],
                'in_stock' => ['nullable', 'numeric'],
                'category' => ['required', 'string'],
                'length' => ['nullable', 'numeric', 'min:0'],
                'width' => ['nullable', 'numeric', 'min:0'],
                'color' => ['nullable', 'string', 'max:200'],
                'type' => ['nullable', 'string', 'max:200'],
                'count_per_box' => ['required', 'numeric', 'min:1'],
                'expiry_date' => ['required', 'date'],
                'cost_unit' => ['nullable', 'string'],
                'bos_unit' => ['nullable', 'string'],
                'weight' => ['nullable', 'string'],
            ]);
    
            $box_price = 0;
            $unit_price = 0;
            if($request->box_price === null && $request->unit_price !== null) {$box_price = $request->unit_price * $request->count_per_box ;$unit_price = $request->unit_price;}
            else if($request->box_price !== null && $request->unit_price === null) {$unit_price = $request->box_price / $request->count_per_box ;$box_price = $request->box_price;}
            else if($request->box_price !== null && $request->unit_price !== null) {$box_price = $request->box_price;$unit_price = $request->unit_price;}
    
            $product = Product::create([
                'name' => $request->name,
                'sort_order' => $request->sort_order ?? 1,
                'is_active' => ($request->status === 'available') ? 1 : 0,
                'wholesale_price' => $request->wholesale_price ?? 0,
                'box_price' => $box_price ?? 0,
                'unit_price' => $unit_price ?? 0,
                'cost' => $request->cost ?? 0,
                'description' => $request->description,
                'box_barcode' => $request->box_barcode,
                'unit_barcode' => $request->unit_barcode,
                'superdealer_barcode' => $request->superdealer_barcode,
                'wholesale_barcode' => $request->wholesale_barcode,
                'box_sku' => $request->box_sku,
                'unit_sku' => $request->unit_sku,
                'superdealer_sku' => $request->superdealer_sku,
                'wholesale_sku' => $request->wholesale_sku,
                'category_id' => $request->category,
                'in_stock' => $request->in_stock ?? 0,
                'track_stock' => $request->has('track_stock'),
                'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),
                'count_per_box' => $request->count_per_box ?? 10,
                'expiry_date' => $request->expiry_date,
                'cost_unit' => $request->cost_unit,
                'box_unit' => $request->box_unit,
                'weight' => $request->weight
            ]);
    
            if ($request->has('image')) {
                $product->updateImage($request->image);
            }
    
            // Attach the created product ID to the MounehIndustry
            $mounehIndustry->product_id = $product->id;
        }else {
            // If next_phase checkbox is not checked, set product_id to null
            $mounehIndustry->product_id = null;
        }
        
        $mounehIndustry->save();

        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MounehIndustry  $mounehIndustry
     * @return \Illuminate\View\View
     */
    public function edit(NutsIndustryMixer $mounehIndustry): View
    {
        $mounehCategory = Category::where('name', 'Nuts Industry Mixer')->first();
        
        // Fetch the associated product, if it exists
        $product = $mounehIndustry->product_id
        ? Product::find($mounehIndustry->product_id)
        : null;
        
        // Handle case if 'mouneh' category is not found
        if (!$mounehCategory) {
            abort(404, 'Nuts Industry Mixer category not found.');
        }
        
        // Determine if 'Next Phase' should be checked
        $isNextPhaseChecked = $product ? true : false;
        $hasExistingProduct = $product ? true : false;
        
        return view("nuts_industry_mixer.edit", [
            'mounehIndustry' => $mounehIndustry,
            'category' => $mounehCategory,
            'product'=> $product,
            'isNextPhaseChecked' => $isNextPhaseChecked,
            'hasExistingProduct' => $hasExistingProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMounehIndustryRequest  $request
     * @param  \App\Models\MounehIndustry  $mounehIndustry
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNutsIndustryMixerRequest $request, NutsIndustryMixer $mounehIndustry): RedirectResponse
    {
        $mounehIndustry->type_of_nuts = $request->type_of_nuts;
        $mounehIndustry->quantity_of_pistachio = $request->quantity_of_pistachio;
        $mounehIndustry->quantity_of_regular_cashew = $request->quantity_of_regular_cashew;
        $mounehIndustry->quantity_of_smoked_cashew = $request->quantity_of_smoked_cashew;
        $mounehIndustry->quantity_of_hazelnut = $request->quantity_of_hazelnut;
        $mounehIndustry->quantity_of_regular_almond = $request->quantity_of_regular_almond;
        $mounehIndustry->quantity_of_smoked_almond = $request->quantity_of_smoked_almond;
        $mounehIndustry->quantity_of_white_seed = $request->quantity_of_white_seed;
        $mounehIndustry->quantity_of_freekeh_almond = $request->quantity_of_freekeh_almond;
        // $mounehIndustry->quantity_of_sugar_salt = $request->quantity_of_sugar_salt;
        // $mounehIndustry->quantity_of_acid = $request->quantity_of_acid;
        // $mounehIndustry->glass_used = $request->glass_used;
        $mounehIndustry->final_quantity = $request->final_quantity;
        
        
        
        
         // Handle the product logic
        if ($mounehIndustry->product_id) {
            // Product exists, update it
            
            $validatedProductData = $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'wholesale_price' => ['nullable', 'numeric', 'min:0'],
                'box_price' => ['nullable', 'numeric', 'min:0'],
                'unit_price' => ['nullable', 'numeric', 'min:0'],
                'cost' => ['nullable', 'numeric', 'min:0'],
                'sort_order' => ['nullable', 'numeric', 'min:0'],
                'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
                'description' => ['nullable', 'string', 'max:2000'],
                'box_barcode' => ['nullable', 'string', 'max:43'],
                'unit_barcode' => ['nullable', 'string', 'max:43'],
                'superdealer_barcode' => ['nullable', 'string', 'max:43'],
                'wholesale_barcode' => ['nullable', 'string', 'max:43'],
                'box_sku' => ['nullable', 'string', 'max:64'],
                'unit_sku' => ['nullable', 'string', 'max:64'],
                'superdealer_sku' => ['nullable', 'string', 'max:64'],
                'wholesale_sku' => ['nullable', 'string', 'max:64'],
                'status' => ['required', 'string'],
                'in_stock' => ['nullable', 'numeric'],
                'category' => ['required', 'string'],
                'length' => ['nullable', 'numeric', 'min:0'],
                'width' => ['nullable', 'numeric', 'min:0'],
                'color' => ['nullable', 'string', 'max:200'],
                'type' => ['nullable', 'string', 'max:200'],
                'count_per_box' => ['required', 'numeric', 'min:1'],
                'expiry_date' => ['required', 'date'],
                'cost_unit' => ['nullable', 'string'],
                'bos_unit' => ['nullable', 'string'],
                'weight' => ['nullable', 'string'],
            ]);
            
            
            $product = Product::find($mounehIndustry->product_id);
            $product->update([
                'name' => $request->name,
                'sort_order' => $request->sort_order ?? 1,
                'is_active' => ($request->status === 'available') ? 1 : 0,
                'wholesale_price' => $request->wholesale_price ?? 0,
                'box_price' => $request->box_price ?? 0,
                'unit_price' => $request->unit_price ?? 0,
                'cost' => $request->cost ?? 0,
                'description' => $request->description,
                'box_barcode' => $request->box_barcode,
                'unit_barcode' => $request->unit_barcode,
                'superdealer_barcode' => $request->superdealer_barcode,
                'wholesale_barcode' => $request->wholesale_barcode,
                'box_sku' => $request->box_sku,
                'unit_sku' => $request->unit_sku,
                'superdealer_sku' => $request->superdealer_sku,
                'wholesale_sku' => $request->wholesale_sku,
                'category_id' => $request->category,
                'in_stock' => $request->in_stock ?? 0,
                'track_stock' => $request->has('track_stock'),
                'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),
                'width' =>  $request->width ?? 0,
                'length' => $request->length ?? 0,
                'color' => $request->color,
                'type' => $request->type,
                'count_per_box' => $request->count_per_box ?? 10,
                'expiry_date' => $request->expiry_date ?? '',
                'cost_unit' => $request->cost_unit ?? '',
                'box_unit' => $request->box_unit ?? '',
                'weight' => $request->weight
            ]);
            
            if ($request->has('image')) {
                $product->updateImage($request->image);
            }
            
        } elseif ($request->next_phase) {
            // No product exists, create a new one
            
            $validatedProductData = $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'wholesale_price' => ['nullable', 'numeric', 'min:0'],
                'box_price' => ['nullable', 'numeric', 'min:0'],
                'unit_price' => ['nullable', 'numeric', 'min:0'],
                'cost' => ['nullable', 'numeric', 'min:0'],
                'sort_order' => ['nullable', 'numeric', 'min:0'],
                'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
                'description' => ['nullable', 'string', 'max:2000'],
                'box_barcode' => ['nullable', 'string', 'max:43'],
                'unit_barcode' => ['nullable', 'string', 'max:43'],
                'superdealer_barcode' => ['nullable', 'string', 'max:43'],
                'wholesale_barcode' => ['nullable', 'string', 'max:43'],
                'box_sku' => ['nullable', 'string', 'max:64'],
                'unit_sku' => ['nullable', 'string', 'max:64'],
                'superdealer_sku' => ['nullable', 'string', 'max:64'],
                'wholesale_sku' => ['nullable', 'string', 'max:64'],
                'status' => ['required', 'string'],
                'in_stock' => ['nullable', 'numeric'],
                'category' => ['required', 'string'],
                'length' => ['nullable', 'numeric', 'min:0'],
                'width' => ['nullable', 'numeric', 'min:0'],
                'color' => ['nullable', 'string', 'max:200'],
                'type' => ['nullable', 'string', 'max:200'],
                'count_per_box' => ['required', 'numeric', 'min:1'],
                'expiry_date' => ['nullable', 'date'],
                'cost_unit' => ['nullable', 'string'],
                'bos_unit' => ['nullable', 'string'],
                'weight' => ['nullable', 'string'],
            ]);
            
            $product = Product::create([
                'name' => $request->name,
                'sort_order' => $request->sort_order ?? 1,
                'is_active' => ($request->status === 'available') ? 1 : 0,
                'wholesale_price' => $request->wholesale_price ?? 0,
                'box_price' => $box_price ?? 0,
                'unit_price' => $unit_price ?? 0,
                'cost' => $request->cost ?? 0,
                'description' => $request->description,
                'box_barcode' => $request->box_barcode,
                'unit_barcode' => $request->unit_barcode,
                'superdealer_barcode' => $request->superdealer_barcode,
                'wholesale_barcode' => $request->wholesale_barcode,
                'box_sku' => $request->box_sku,
                'unit_sku' => $request->unit_sku,
                'superdealer_sku' => $request->superdealer_sku,
                'wholesale_sku' => $request->wholesale_sku,
                'category_id' => $request->category,
                'in_stock' => $request->in_stock ?? 0,
                'track_stock' => $request->has('track_stock'),
                'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),
                'count_per_box' => $request->count_per_box ?? 10,
                'expiry_date' => $request->expiry_date,
                'cost_unit' => $request->cost_unit,
                'box_unit' => $request->box_unit,
                'weight' => $request->weight
            ]);
            if ($request->has('image')) {
                $product->updateImage($request->image);
            }
            

            $mounehIndustry->product_id = $product->id; // Store the new product ID
        }else {
            // If next_phase checkbox is not checked, set product_id to null
            $mounehIndustry->product_id = null;
        }
        
        
        
        $mounehIndustry->save();

        return back()->with('success', __('Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MounehIndustry  $mounehIndustry
     * @return \Illuminate\Http\RedirectResponse
     */
   public function destroy(NutsIndustryMixer $mounehIndustry): RedirectResponse
    {
        // Delete the associated product if it exists
        if ($mounehIndustry->product) {
            $mounehIndustry->product->delete(); // Delete the related Product
        }
    
        // Delete the MounehIndustry record
        $mounehIndustry->delete();
    
        return Redirect::back()->with("success", __("Deleted"));
    }
}