<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reservation;

class User extends Authenticatable {
    protected $fillable = ['nom', 'email', 'mot_de_passe', 'rôle'];

    public function reservations() {
        return $this->hasMany(Reservation::class, 'client_id');
    }
    public function getAuthPassword(){
    return $this->mot_de_passe;
    }

}
