<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = ['numero', 'capacite'];

    public function seances()
    {
        return $this->hasMany(Seance::class, 'salle_id');
    }
}
