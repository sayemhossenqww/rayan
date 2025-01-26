<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LabanProcess1 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'laban_process';

    public function laban2() : HasOne
    {
        return $this->hasOne(LabanProcess2::class, 'parent_id', 'id');
    }
}