<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CheeseProcess1 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'cheese_process_1';

    public function cheese2() : HasOne
    {
        return $this->hasOne(CheeseProcess2::class, 'parent_id', 'id');
    }
}