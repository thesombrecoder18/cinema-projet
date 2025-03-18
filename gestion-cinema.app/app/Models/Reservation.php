<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {
    protected $fillable = ['client_id', 'seance_id', 'statut', 'place'];

    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function seance() {
        return $this->belongsTo(Seance::class);
    }

    public function paiement() {
        return $this->hasOne(Paiement::class);
    }
    public function user() {
        return $this->belongsTo(User::class, 'client_id');
    }
}
