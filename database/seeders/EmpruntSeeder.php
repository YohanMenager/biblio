<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Utilisateur, Emprunt};

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emprunt::Factory()
        ->has(Utilisateur::factory()->count(3))
        ->count(5)
        ->create();
    }
}
