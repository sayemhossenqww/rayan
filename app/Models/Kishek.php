<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Kishek extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'kishek';

    public function kishek_1() : HasOne
    {
        return $this->hasOne(Kishek1::class, 'parent_id', 'id');
    }

    public function kishek_2() : HasOne
    {
        return $this->hasOne(Kishek2::class, 'parent_id', 'id');
    }

    public function kishek_3() : HasOne
    {
        return $this->hasOne(Kishek3::class, 'parent_id', 'id');
    }

    public function kishek_4() : HasOne
    {
        return $this->hasOne(Kishek4::class, 'parent_id', 'id');
    }

    public function kishek_5() : HasOne
    {
        return $this->hasOne(Kishek5::class, 'parent_id', 'id');
    }

    public function kishek_6() : HasOne
    {
        return $this->hasOne(Kishek6::class, 'parent_id', 'id');
    }

    public function kishek_7() : HasOne
    {
        return $this->hasOne(Kishek7::class, 'parent_id', 'id');
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