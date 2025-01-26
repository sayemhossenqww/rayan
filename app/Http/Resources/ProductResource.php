<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'name' => $this->name,
            'price' => $this->price,
            'wholesale_price' => $this->wholesale_price,
            // 'retailsale_price' => $this->retailsale_price,
            'box_price' => $this->box_price,
            'unit_price' => $this->unit_price,
            'price_per_gram' => $this->price_per_gram,
            'price_per_kilogram' => $this->price_per_kilogram,
            'image_url' => $this->image_url,
            'barcode' => $this->barcode,
            // 'wholesale_barcode' => $this->wholesale_barcode,
            // 'retail_barcode' => $this->retail_barcode,
            'box_barcode' => $this->box_barcode,
            'unit_barcode' => $this->unit_barcode,
            'superdealer_barcode' => $this->superdealer_barcode,
            'wholesale_barcode' => $this->wholesale_barcode,
            'pricepergram_barcode' => $this->pricepergram_barcode,
            'priceperkilogram_barcode' => $this->priceperkilogram_barcode,
            'sku' => $this->sku,
            'wholesale_sku' => $this->wholesale_sku,
            'pricepergram_sku' => $this->pricepergram_sku, 
            'priceperkilogram_sku' => $this->priceperkilogram_sku, 
            // 'retail_sku' => $this->retail_sku,
            'box_sku' => $this->box_sku,
            'unit_sku' => $this->unit_sku,
            'in_stock' => $this->in_stock,
            'track_stock' => (bool)$this->track_stock,
            'continue_selling_when_out_of_stock' => (bool)$this->continue_selling_when_out_of_stock,
            'count_per_box' => $this->count_per_box ?? 10,
            'expiry_date' => $this->expiry_date,
            'cost_unit' => $this->cost_unit ?? '',
            'box_unit' => $this->box_unit ?? '',
            'expiry_date' => $this->expiry_date_view ?? ''
        ];
    }
}