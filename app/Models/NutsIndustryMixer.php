<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class NutsIndustryMixer extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_nuts', 'quantity_of_pistachio','quantity_of_regular_cashew','quantity_of_smoked_cashew','quantity_of_hazelnut','quantity_of_regular_almond','quantity_of_smoked_almond','quantity_of_white_seed','quantity_of_freekeh_almond',
        'final_quantity', 'product_id'
    ];
    
    // Declare the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


        /**
     * Scope a query to search based on multiple fields.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|null  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if (!$search) {
            return $query;
        }
    
        return $query->where('type_of_nuts', 'LIKE', "%{$search}%")
                     ->orWhere('glass_used', 'LIKE', "%{$search}%");
    }
}
