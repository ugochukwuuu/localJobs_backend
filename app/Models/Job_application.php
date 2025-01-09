<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;


    // Mass assignable attributes
    protected $gaurded = [];

    /**
     * Relationship with the Job model.
     */
    public function job()
    {
        return $this->belongsTo(JobModel::class);
    }

    /**
     * Relationship with the Freelancer model.
     */
    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
}
