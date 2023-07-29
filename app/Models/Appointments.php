<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Appointments extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'client_id',
        'therapist_id',
        'created_by',
        'ongoing',
        'start_time',
        'deleted_at'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function therapist()
    {
        return $this->belongsTo(Therapists::class, 'therapist_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}