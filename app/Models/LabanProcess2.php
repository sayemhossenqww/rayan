<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LabanProcess2 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'laban_process_2';

}