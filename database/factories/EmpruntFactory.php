<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Emprunt;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'id_ouvrage',
            'id_utilisateur',
            'date_emprunt'=> $this->faker->date(),
            'date_retour_prevue'=>"null",
            'date_retour_reel'=> "null"
        ];
    }
}
