<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reservation;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['nom', 'email', 'password', 'role'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'client_id');
    }

    public function isClient()
    {
        return $this->role === 'client';
    }
    public function isAdmin()
    {
        // return $this->role === 'administrateur';
        return $this->role === 'admin';
    }
}
