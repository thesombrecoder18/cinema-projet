<?php

use Illuminate\Database\Eloquent\Model;

class Film extends Model {
    protected $fillable = ['titre', 'description', 'durée', 'catégorie', 'date_sortie'];

    public function seances() {
        return $this->hasMany(Seance::class);
    }
}

