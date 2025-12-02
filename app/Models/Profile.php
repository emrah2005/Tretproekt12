<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'avatar_url',
        'dna_vector',
        'followers_count',
        'engagement_rate',
        'platforms',
    ];

    protected $casts = [
        'dna_vector' => 'array',
        'platforms' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
