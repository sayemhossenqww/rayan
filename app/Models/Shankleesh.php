<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shankleesh extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'shankleesh';
}