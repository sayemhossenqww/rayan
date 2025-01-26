<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Settings;
use Illuminate\View\View;
use App\Traits\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\ProductSelectResourceCollection;

use Milon\Barcode\DNS1D;

class ProductController extends Controller
{
    use Availability;

    public $data;

    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $hasExchangeRate = config('settings')->enableExchangeRateForItems;
        $exchangeRate = config('settings')->exchangeRate;
        $products = Product::all();
        $sum_cost = Product::sum(DB::raw('cost * in_stock'));
        $sum_unit_price = Product::sum('unit_price');
        $sum_box_price = Product::sum('box_price');

        $total_whole_cost = 0;
        $total_whole_unit_price = 0;
        $total_whole_box_price = 0;
        foreach ($products as $p) {
            $total_whole_cost += $p->cost * $p->in_stock;
            $total_whole_unit_price += $p->unit_price * $p->in_stock;
            $total_whole_box_price += $p->box_price * $p->in_stock / 10;
        }


        $this->data['categories'] = Category::orderBy('sort_order', 'ASC')->get();
        $this->data['total_cost'] = currency_format($sum_cost);
        $this->data['total_whole_cost'] = currency_format($total_whole_cost, $hasExchangeRate).' ('.currency_format($sum_cost).')';
        $this->data['total_unit_price'] = currency_format($sum_unit_price);
        $this->data['total_whole_unit_price'] = currency_format($total_whole_unit_price, $hasExchangeRate).' ('.currency_format($total_whole_unit_price).')';
        $this->data['total_box_price'] = currency_format($sum_box_price, $hasExchangeRate).' ('.currency_format($sum_box_price).')';
        $this->data['total_whole_box_price'] = currency_format($total_whole_box_price, $hasExchangeRate).' ('.currency_format($total_whole_box_price).')';
        $this->data['total_in_stock'] = Product::sum('in_stock');




        return view("products.index", $this->data);
    }


    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {

        return view("products.create", [
            'categories' => Category::orderBy('sort_order', 'ASC')->get(),
        ]);
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Product $product): View
    {
        $dns1d = new DNS1D(); // Create an instance of the DNS1D class
        $dns1d->setStorPath(__DIR__ . '/cache/');
        $barcodeHTML = 'data:image/png;base64,' . $dns1d->getBarcodePNG($product->barcode, 'C128');
        
        return view("products.edit", [
            'product' => $product,
            'barcode' => $barcodeHTML,
            'categories' => Category::orderBy('sort_order', 'ASC')->get(),
        ]);
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return Redirect::back()->with("success", __("Deleted"));
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function imageDestroy(Product $product): RedirectResponse
    {
        $product->deleteImage();
        return Redirect::back()->with("success", __("Image Removed"));
    }

    /**
     * Show resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            // 'sale_price' => ['nullable', 'numeric', 'min:0'],
            'wholesale_price' => ['nullable', 'numeric', 'min:0'],
            // 'retailsale_price' => ['nullable', 'numeric', 'min:0'],
            'box_price' => ['nullable', 'numeric', 'min:0'],
            'unit_price' => ['nullable', 'numeric', 'min:0'],
            // 'price_per_gram' => ['nullable', 'numeric', 'min:0'],
            // 'price_per_kilogram' => ['nullable', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'sort_order' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
            'description' => ['nullable', 'string', 'max:2000'],
            // 'barcode' => ['nullable', 'string', 'max:43'],
            // 'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            // 'retail_barcode' => ['nullable', 'string', 'max:43'],
            'box_barcode' => ['nullable', 'string', 'max:43'],
            'unit_barcode' => ['nullable', 'string', 'max:43'],
            'superdealer_barcode' => ['nullable', 'string', 'max:43'],
            'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            // 'pricepergram_barcode' => ['nullable', 'string', 'max:43'],
            // 'priceperkilogram_barcode' => ['nullable', 'string', 'max:43'],
            // 'sku' => ['nullable', 'string', 'max:64'],
            // 'wholesale_sku' => ['nullable', 'string', 'max:64'],
            // 'retail_sku' => ['nullable', 'string', 'max:64'],
            'box_sku' => ['nullable', 'string', 'max:64'],
            'unit_sku' => ['nullable', 'string', 'max:64'],
            'superdealer_sku' => ['nullable', 'string', 'max:64'],
            'wholesale_sku' => ['nullable', 'string', 'max:64'],
            // 'pricepergram_sku' => ['nullable', 'string', 'max:64'],
            // 'priceperkilogram_sku' => ['nullable', 'string', 'max:64'],
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
        ]);

        // $wholesale_price = 0;
        // $retailsale_price = 0;
        // if($request->wholesale_price === null && $request->retailsale_price !== null) {$wholesale_price = $request->retailsale_price * 10;$retailsale_price = $request->retailsale_price;}
        // else if($request->wholesale_price !== null && $request->retailsale_price === null) {$retailsale_price = $request->wholesale_price / 10;$wholesale_price = $request->wholesale_price;}
        // else if($request->wholesale_price !== null && $request->retailsale_price !== null) {$wholesale_price = $request->wholesale_price;$retailsale_price = $request->retailsale_price;}

        $box_price = 0;
        $unit_price = 0;
        if($request->box_price === null && $request->unit_price !== null) {$box_price = $request->unit_price * $request->count_per_box ;$unit_price = $request->unit_price;}
        else if($request->box_price !== null && $request->unit_price === null) {$unit_price = $request->box_price / $request->count_per_box ;$box_price = $request->box_price;}
        else if($request->box_price !== null && $request->unit_price !== null) {$box_price = $request->box_price;$unit_price = $request->unit_price;}


        // Barcode 
        $randomCode = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        $formattedWeight = str_pad((int)$request->total_weight, 3, '0', STR_PAD_LEFT);
        $formattedPrice = str_pad((int)$request->unit_price, 3, '0', STR_PAD_LEFT);
        
        $barcodeNumber = $randomCode . $formattedWeight . $formattedPrice;
        // $barcodeNumber = hash('crc32b', $barcodeString); // Example output: 7f5d8c3a
        

        $product = Product::create([
            'name' => $request->name,
            'sort_order' => $request->sort_order ?? 1,
            'is_active' => $this->isAvailable($request->status),
            // 'sale_price' => $request->sale_price ?? 0,
            'wholesale_price' => $request->wholesale_price ?? 0,
            // 'retailsale_price' => $retailsale_price ?? 0,
            'box_price' => $box_price ?? 0,
            'unit_price' => $unit_price ?? 0,
            'cost' => $request->cost ?? 0,
            'description' => $request->description,
            // 'barcode' => $request->barcode,
            // 'wholesale_barcode' => $request->wholesale_barcode,
            // 'retail_barcode' => $request->retail_barcode,
            'box_barcode' => $request->box_barcode,
            'unit_barcode' => $request->unit_barcode,
            'superdealer_barcode' => $request->superdealer_barcode,
            'wholesale_barcode' => $request->wholesale_barcode,
            // 'pricepergram_barcode' => $request->pricepergram_barcode,
            // 'priceperkilogram_barcode' => $request->priceperkilogram_barcode,
            // 'sku' => $request->sku,
            // 'wholesale_sku' => $request->wholesale_sku,
            // 'retail_sku' => $request->retail_sku,
            'box_sku' => $request->box_sku,
            'unit_sku' => $request->unit_sku,
            'superdealer_sku' => $request->superdealer_sku,
            'wholesale_sku' => $request->wholesale_sku,
            // 'pricepergram_sku' => $request->pricepergram_sku,
            // 'priceperkilogram_sku' => $request->priceperkilogram_sku,
            // 'price_per_kilogram'=>$request->price_per_kilogram ?? 0.0,
            // 'price_per_gram'=>$request->price_per_gram ?? 0.0,
            'category_id' => $request->category,
            'in_stock' => $request->in_stock ?? 0,
            'track_stock' => $request->has('track_stock'),
            'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),
            'count_per_box' => $request->count_per_box ?? 10,
            'expiry_date' => $request->expiry_date,
            'cost_unit' => $request->cost_unit,
            'box_unit' => $request->box_unit,
            'total_weight' => $request->total_weight,
            'barcode' => $barcodeNumber
        ]);

        // echo($request->retailsale_price);

        if ($request->has('image')) {
            $product->updateImage($request->image);
        }
        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * update resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse
    {

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            // 'sale_price' => ['nullable', 'numeric', 'min:0'],
            'wholesale_price' => ['nullable', 'numeric', 'min:0'],
            // 'retailsale_price' => ['nullable', 'numeric', 'min:0'],
            'box_price' => ['nullable', 'numeric', 'min:0'],
            'unit_price' => ['nullable', 'numeric', 'min:0'],
            // 'price_per_gram' => ['nullable', 'numeric', 'min:0'],
            // 'price_per_kilogram' => ['nullable', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'sort_order' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
            'description' => ['nullable', 'string', 'max:2000'],
            // 'barcode' => ['nullable', 'string', 'max:43'],
            // 'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            // 'retail_barcode' => ['nullable', 'string', 'max:43'],
            'box_barcode' => ['nullable', 'string', 'max:43'],
            'unit_barcode' => ['nullable', 'string', 'max:43'],
            'superdealer_barcode' => ['nullable', 'string', 'max:43'],
            'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            // 'pricepergram_barcode' => ['nullable', 'string', 'max:43'],
            // 'priceperkilogram_barcode' => ['nullable', 'string', 'max:43'],
            // 'sku' => ['nullable', 'string', 'max:64'],
            // 'wholesale_sku' => ['nullable', 'string', 'max:64'],
            // 'retail_sku' => ['nullable', 'string', 'max:64'],
            'box_sku' => ['nullable', 'string', 'max:64'],
            'unit_sku' => ['nullable', 'string', 'max:64'],
            'superdealer_sku' => ['nullable', 'string', 'max:64'],
            'wholesale_sku' => ['nullable', 'string', 'max:64'],
            'pricepergram_sku' => ['nullable', 'string', 'max:64'],
            'priceperkilogram_sku' => ['nullable', 'string', 'max:64'],
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
            'total_weight' => ['nullable', 'integer'],
        ]);

        // $wholesale_price = 0;
        // $retailsale_price = 0;
        // if($request->wholesale_price === null && $request->retailsale_price !== null) {$wholesale_price = $request->retailsale_price * 20;$retailsale_price = $request->retailsale_price;}
        // else if($request->wholesale_price !== null && $request->retailsale_price === null) {$retailsale_price = $request->wholesale_price / 20;$wholesale_price = $request->wholesale_price;}
        // else if($request->wholesale_price !== null && $request->retailsale_price !== null) {$wholesale_price = $request->wholesale_price;$retailsale_price = $request->retailsale_price;}

        $box_price = 0;
        $unit_price = 0;
        if($request->box_price === null && $request->unit_price !== null) {$box_price = $request->unit_price * $request->count_per_box; $unit_price = $request->unit_price;}
        else if($request->box_price !== null && $request->unit_price === null) {$unit_price = $request->box_price / $request->count_per_box; $box_price = $request->box_price;}
        else if($request->box_price !== null && $request->unit_price !== null) {$box_price = $request->box_price;$unit_price = $request->unit_price;}

        // Barcode 
        $randomCode = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        $formattedWeight = str_pad((int)$request->total_weight, 3, '0', STR_PAD_LEFT);
        $formattedPrice = str_pad((int)$request->unit_price, 3, '0', STR_PAD_LEFT);

        $barcodeNumber = $randomCode . $formattedWeight . $formattedPrice;

        $product->update([
            'name' => $request->name,
            'sort_order' => $request->sort_order ?? 1,
            'is_active' => $this->isAvailable($request->status),
            // 'sale_price' => $request->sale_price ?? 0,
            'wholesale_price' => $request->wholesale_price ?? 0,
            // 'retailsale_price' => $request->retailsale_price ?? 0,
            'box_price' => $request->box_price ?? 0,
            'unit_price' => $request->unit_price ?? 0,
            'cost' => $request->cost ?? 0,
            'description' => $request->description,
            // 'barcode' => $request->barcode,
            // 'wholesale_barcode' => $request->wholesale_barcode,
            // 'retail_barcode' => $request->retail_barcode,
            'box_barcode' => $request->box_barcode,
            'unit_barcode' => $request->unit_barcode,
            'superdealer_barcode' => $request->superdealer_barcode,
            'wholesale_barcode' => $request->wholesale_barcode,
            // 'pricepergram_barcode' => $request->pricepergram_barcode,
            // 'priceperkilogram_barcode' => $request->priceperkilogram_barcode,
            // 'sku' => $request->sku,
            // 'wholesale_sku' => $request->wholesale_sku,
            // 'retail_sku' => $request->retail_sku,
            'box_sku' => $request->box_sku,
            'unit_sku' => $request->unit_sku,
            'superdealer_sku' => $request->superdealer_sku,
            'wholesale_sku' => $request->wholesale_sku,
            // 'pricepergram_sku' => $request->pricepergram_sku,
            // 'priceperkilogram_sku' => $request->priceperkilogram_sku,
            // 'price_per_kilogram'=>$request->price_per_kilogram ?? 0.0,
            // 'price_per_gram'=>$request->price_per_gram ?? 0.0,
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
            'total_weight' => $request->total_weight ?? '',
            'barcode' => $barcodeNumber ?? '',
        ]);
        if ($request->has('image')) {
            $product->updateImage($request->image);
        }
        return Redirect::back()->with("success", __("Updated"));
    }


    public function search(Request $request)
    {
        $query = trim($request->get('query'));
        if (is_null($query)) {
            return $this->jsonResponse(['data' => []]);
        }
        $products = Product::search($query)->latest()->take(10)->get();
        return $this->jsonResponse(['data' => new ProductSelectResourceCollection($products)]);
    }
}