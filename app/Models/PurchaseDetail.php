<?php

namespace App\Models;
use App\Traits\HasUuid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasUuid, HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
}