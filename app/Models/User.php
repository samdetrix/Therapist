<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_THERAPIST = 'therapist';
    const ROLE_CLIENT = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'therapist_id',
    ];

    public function therapistAppointments()
    {
        return $this->hasMany(Appointments::class, 'therapist_id');
    }
    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }
    public function therapistClientsAppointments()
    {
        return $this->hasManyThrough(Appointments::class, Therapist::class, 'user_id', 'therapist_id');
    }
    public function clientAppointments()
    {
        return $this->hasMany(Appointments::class, 'client_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function getRoleAttribute($value)
    {
        return ucfirst($value);
    }


    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = strtolower($value);
    }
}
