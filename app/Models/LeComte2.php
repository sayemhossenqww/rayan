<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeComte2 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'le_comte_2';
}