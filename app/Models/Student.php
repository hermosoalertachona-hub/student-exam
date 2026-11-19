<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'department_id'
    ];

    // One student belongs to one department
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    // One student has one profile
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    // One student can have many courses
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}