<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheeseProcess2 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'cheese_process_2';

    public function cheese1() : BelongsTo
    {
        return $this->belongsTo(CheeseProcess1::class, 'id', 'parent_id');
    }
}