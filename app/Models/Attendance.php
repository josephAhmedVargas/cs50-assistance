<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['cycle_id', 'schedule', 'registered_by', 'type', 'class_number', 'office_hour_week'];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function user_who_registered()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'attendance_students', 'attendance_id', 'student_id')
            ->withPivot('hours_attended', 'present', 'notes')
            ->withTimestamps();
    }

}
