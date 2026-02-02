<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function supervisor() {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function documents() {
        return $this->hasMany(Document::class);
    }

    public function evaluations() {
        return $this->hasMany(Evaluation::class);
    }
    // علاقة الطالب

// علاقة المشرف (Staff)
public function staff()
{
    return $this->belongsTo(Staff::class, 'staff_id');
}

// علاقة القسم
public function department()
{
    return $this->belongsTo(Department::class, 'department_id');
}
}
