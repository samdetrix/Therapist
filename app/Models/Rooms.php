<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'building_name', 
        'created_by',
        'therapist_id',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function therapist()
    {
        return $this->belongsTo(Therapists::class, 'therapist_id');
    }
}
