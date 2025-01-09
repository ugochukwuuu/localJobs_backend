<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Table name (optional if following conventions)
    protected $table = 'jobs';

    // Mass assignable attributes
    protected $gaurded = [];

    /**
     * Relationship with the Recruiter model.
     */
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    /**
     * Relationship with the JobApplication model.
     */
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
