<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Film;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nom' => 'baye',
            'email' => 'elimaneka19@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'administrateur',
        ]);
        User::create([
            'nom' => 'baye',
            'email' => 'amadou@esp.sn',
            // 'password' => bcrypt('password'),
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);
        Film::create([
            'titre' => 'Inception',
            'description' => 'Un film de science-fiction',
            'duree' => 148,
            'categorie' => 'Science-fiction',
            'date_sortie' => '2010-07-16'
        ]);

        Salle::create([
            'numero' => '1',
            'capacite' => 100,
        ]);
        Salle::create([
            'numero' => '2',
            'capacite' => 50,
        ]);
        Salle::create([
            'numero' => '3',
            'capacite' => 75,
        ]);

        Seance::create([
            'film_id' => 1,
            'salle_id' => 1,
            'date_heure' => '2023-10-01 14:00:00',
        ]);
        Seance::create([
            'film_id' => 1,
            'salle_id' => 2,
            'date_heure' => '2023-10-01 16:00:00',
        ]);
        Seance::create([
            'film_id' => 1,
            'salle_id' => 3,
            'date_heure' => '2023-10-01 18:00:00',
        ]);
    }
}
