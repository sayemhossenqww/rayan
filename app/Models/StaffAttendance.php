<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffAttendance extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'staff_attendances';

    /**
     * Scope a query to search Suppliers
     */
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if (!$search)  return $query;
        return $query->where('name', 'LIKE', "%{$search}%");
    }

    /**
     * Get the staff that owns the attendance.
     */
    public function staff() : BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staffs_id', 'id')->withDefault();
    }
}