<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GoudaRegular1 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'gouda_regular_1';

    public function regular2() : HasOne
    {
        return $this->hasOne(GoudaRegular2::class, 'parent_id', 'id');
    }
}