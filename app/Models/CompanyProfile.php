<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'email',
        'phone_number',
        'website',
        'est_since',
        'team_size',
        'category',
        'allow_in_search',
        'description',
        'facebook',
        'twitter',
        'linkedin',
        'google_plus',
        'city',
        'address',
    ];

    public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
}
