<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model {
    protected $fillable = ['reservation_id', 'montant', 'statut'];

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }
}
