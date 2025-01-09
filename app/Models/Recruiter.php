<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    protected $gaurded = [];

    // Inverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One-to-many relationship with Job
    public function jobs()
    {
        return $this->hasMany(JobModel::class);
    }
}
