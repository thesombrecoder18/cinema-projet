<?php

use Illuminate\Database\Eloquent\Model;

class Salle extends Model {
    protected $fillable = ['numéro', 'capacité'];

    public function seances() {
        return $this->hasMany(Seance::class);
    }
}
