<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Tomme2 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'tomme_2';
}