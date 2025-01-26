<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Raclette1 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'raclette';

    public function raclette2() : HasOne
    {
        return $this->hasOne(Raclette2::class, 'parent_id', 'id');
    }

    public function dateView($date): string
    {

        if ($date) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($date)->format($dateFormat);
        }
        return '';
    }
}