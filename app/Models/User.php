<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function campaignsAsBrand()
    {
        return $this->hasMany(Campaign::class, 'brand_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'influencer_id');
    }

    public function threadsBrand()
    {
        return $this->hasMany(Thread::class, 'brand_id');
    }

    public function threadsInfluencer()
    {
        return $this->hasMany(Thread::class, 'influencer_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function deliverables()
    {
        return $this->hasMany(Deliverable::class, 'influencer_id');
    }

    public function ratingsGiven()
    {
        return $this->hasMany(Rating::class, 'rater_id');
    }

    public function ratingsReceived()
    {
        return $this->hasMany(Rating::class, 'ratee_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'influencer_id');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isBrand()
    {
        return $this->role === 'brand';
    }

    public function isInfluencer()
    {
        return $this->role === 'influencer';
    }
}
