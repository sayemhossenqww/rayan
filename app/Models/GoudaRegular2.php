<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class GoudaRegular2 extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'gouda_regular_2';

    public function regular1() : BelongsTo
    {
        return $this->belongsTo(GoudaRegular1::class, 'id', 'parent_id');
    }

    public function getDateView1Attribute(): string
    {

        if ($this->date_1) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->date_1)->format($dateFormat);
        }
        return '';
    }

    public function getDateView2Attribute(): string
    {

        if ($this->date_2) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->date_2)->format($dateFormat);
        }
        return '';
    }

    public function getDateView3Attribute(): string
    {

        if ($this->date_3) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->date_3)->format($dateFormat);
        }
        return '';
    }

    public function getDateView4Attribute(): string
    {

        if ($this->date_4) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->date_4)->format($dateFormat);
        }
        return '';
    }

    public function getDateView5Attribute(): string
    {

        if ($this->date_5) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->date_5)->format($dateFormat);
        }
        return '';
    }

    public function getDateView6Attribute(): string
    {

        if ($this->date_6) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->date_6)->format($dateFormat);
        }
        return '';
    }

    public function getDateView7Attribute(): string
    {

        if ($this->date_7) {
            $dateFormat = Settings::getValue(Settings::DATE_FORMATE);
            return Carbon::parse($this->date_7)->format($dateFormat);
        }
        return '';
    }
}