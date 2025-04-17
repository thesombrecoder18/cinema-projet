<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $fillable = ['film_id', 'salle_id', 'date_heure'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'salle_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'seance_id');
    }
}
