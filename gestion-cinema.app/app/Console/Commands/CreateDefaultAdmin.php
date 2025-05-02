<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateDefaultAdmin extends Command
{
    protected $signature = 'make:admin';
    protected $description = 'Créer un administrateur par défaut';

    public function handle()
    {
        $admin = User::where('email', 'admin@cinema.com')->first();

        if (!$admin) {
            User::create([
                'nom' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'administrateur',
            ]);

            $this->info('Administrateur par défaut créé avec succès.');
        } else {
            $this->info('Un administrateur avec cet email existe déjà.');
        }
    }
}
