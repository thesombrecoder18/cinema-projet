<?php
class Seance extends Model {
    protected $fillable = ['film_id', 'salle_id', 'date_heure'];

    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function salle() {
        return $this->belongsTo(Salle::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
