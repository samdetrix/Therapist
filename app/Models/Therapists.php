<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Therapists extends Model
{
    use HasFactory, HasApiTokens, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'id_number',
        'gender',
        'contact_person',
        'town',
        'skills',
        'email',
        'availability',
        'created_by',
        'deleted_at',
    ];

    public function createdBy()
{
    return $this->belongsTo(User::class, 'created_by');
}
    
}