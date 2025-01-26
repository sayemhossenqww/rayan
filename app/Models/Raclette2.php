<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Raclette2 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'raclette_2';

    public function dateView($date): string
    {

        if ($date) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($date)->format($dateFormat);
        }
        return '';
    }
}