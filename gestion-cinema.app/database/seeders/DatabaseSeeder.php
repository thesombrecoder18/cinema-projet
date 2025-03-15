<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Film;
use Illuminate\Database\Seeder;

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
            'mot_de_passe' => bcrypt('password'),
            'rôle' => 'administrateur',
        ]);
        Film::create([
            'titre' => 'Inception',
            'description' => 'Un film de science-fiction',
            'durée' => 148,
            'catégorie' => 'Science-fiction',
            'date_sortie' => '2010-07-16'
        ]);
    }
}
