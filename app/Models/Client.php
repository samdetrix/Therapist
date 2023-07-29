<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'created_by',
        'identification_number',
        'gender',
        'email',
        'address',
        'phone_number',
        'next_of_kin_name',
        'next_of_kin_number',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}