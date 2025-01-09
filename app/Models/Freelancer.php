<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $gaurded = [];

    // Inverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Many-to-many relationship with Job
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_applications'); // Job applications as pivot table
    }
}
