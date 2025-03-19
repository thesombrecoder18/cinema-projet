<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reservation;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;
    protected $fillable = ['nom', 'email', 'mot_de_passe', 'rôle'];
    protected $hidden = [
        'mot_de_passe',
    ];
    public function reservations() {
        return $this->hasMany(Reservation::class, 'client_id');
    }
    public function getAuthPassword(){
    return $this->mot_de_passe;
    }

}
