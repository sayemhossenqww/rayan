<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Kishek4 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'kishek_4';

    public function getDateViewAttribute(): string
    {

        if ($this->breaking_date) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->breaking_date)->format($dateFormat);
        }
        return '';
    }
}