<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['titre', 'description', 'duree', 'categorie', 'date_sortie'];

    public function seances()
    {
        return $this->hasMany(Seance::class, 'film_id');
    }
}
