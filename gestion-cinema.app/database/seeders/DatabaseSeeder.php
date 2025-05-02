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
            'email' => 'elizo@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'administrateur',
        ]);
        User::create([
            'nom' => 'Billo',
            'email' => 'amadou@esp.sn',
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);
        Film::create([
            'titre' => 'Inception',
            'description' => 'Un film de science-fiction',
            'duree' => 148,
            'categorie' => 'Science-fiction',
            'date_sortie' => '2025-07-16'
        ]);
        Film::create([
            'titre' => 'Comment Bachir a conquit ses 4 femmes',
            'description' => 'Bachir, un séducteur malgré lui, navigue entre maladresses et coups de génie pour conquérir le cœur de ses quatre élues. Entre quiproquos hilarants et stratégies douteuses, découvrez comment cet amoureux du ballon rond est devenu un virtuose… du romantisme bancal !',
            'duree' => 120,
            'categorie' => 'Amour, comedie',
            'date_sortie' => '2025-05-02'
        ]);
        Film::create([
            'titre' => 'Bachir, le Messi du dimanche, qui aurait pu briller…',
            'description' => 'Bachir avait tout pour devenir une légende du football… enfin, presque. Entre les contrôles approximatifs et les tirs qui finissent plus souvent dans le parking que dans les filets, son parcours est une épopée aussi drôle qu’émouvante. Mais quand une dernière chance s’offre à lui, saura-t-il enfin briller sous les projecteurs, ou restera-t-il à jamais le roi des terrains vagues ?',
            'duree' => 90,
            'categorie' => 'Comedie',
            'date_sortie' => '2025-05-05'
        ]);
        Film::create([
            'titre' => 'Bachir, roi du buffet à volonté',
            'description' => 'Quand il s\'agit de manger, Bachir ne fait pas les choses à moitié ! Des entrées aux desserts, chaque plat est un défi, chaque assiette une conquête. Mais jusqu\’où ira-t-il dans sa quête du buffet ultime ? Entre assiettes surchargées, stratégies de gourmand professionnel et un ventre qui a ses limites, suivez l\’épopée culinaire d\’un homme prêt à tout… enfin, surtout à manger !',
            'duree' => 100,
            'categorie' => 'Comedie',
            'date_sortie' => '2025-05-10'
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
            'film_id' => 2,
            'salle_id' => 2,
            'date_heure' => '2023-10-01 16:00:00',
        ]);
        Seance::create([
            'film_id' => 3,
            'salle_id' => 3,
            'date_heure' => '2023-10-01 18:00:00',
        ]);
    }
}
