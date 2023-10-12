<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'pay',
        'experience_id',
        'category_id',
        'location',
        'job_type_id',
    ];

    public function category(){
        return $this->belongsTo(JobCategory::class);
    }
}
