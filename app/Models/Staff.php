<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'staffs';
    
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    protected $fillable = [
        'name',
        'order'
    ];

    /**
     * Scope a query to search Suppliers
     */
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if (!$search)  return $query;
        return $query->where('name', 'LIKE', "%{$search}%");
    }


    public function getAttendance($year, $month) : StaffAttendance
    {
        $attendance =  StaffAttendance::where('year', '=', $year)
                    ->where('month', '=', $month)
                    ->where('staffs_id', $this->id)
                    ->first();

        if ($attendance == null) {
            $attendance = new StaffAttendance();
            $attendance->staffs_id = $this->id;
            $attendance->year = $year;
            $attendance->month = $month;
            $attendance->save();
        }

        return $attendance;
    }

    public function getMilkDetail($year, $week) : MilkDetail
    {
        $detail =  MilkDetail::where('year', '=', $year)
                    ->where('week', '=', $week)
                    ->where('staffs_id', $this->id)
                    ->first();

        if ($detail == null) {
            $detail = new MilkDetail();
            $detail->staffs_id = $this->id;
            $detail->year = $year;
            $detail->week = $week;
            $detail->save();
        }

        return $detail;
    }

    /**
     * Get the attendancess for the staff.
     */
    public function attendances() : HasMany
    {
        return $this->hasMany(StaffAttendance::class, 'staffs_id');
    }

    /**
     * Get the milk details for the staff.
     */
    public function milkDetails() : HasMany
    {
        return $this->hasMany(MilkDetail::class, 'staffs_id');
    }
}