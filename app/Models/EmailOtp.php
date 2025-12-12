<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailOtp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'new_email',
        'otp',
        'expires_at',
    ];

    protected $dates = ['expires_at'];
}
