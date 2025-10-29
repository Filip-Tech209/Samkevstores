<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Add 'usertype' to the fillable array to allow mass-assignment
    protected $fillable = [
        'name', 'email', 'password', 'usertype',
    ];

    // Optional: Cast 'usertype' to an integer if it's not already stored as an integer
    protected $casts = [
        'usertype' => 'integer',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

