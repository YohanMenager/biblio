<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Utilisateur;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    //ajouter le nom la classe
    protected $model=Utilisateur::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        return [
            
            'statut'=>$this->faker->randomElement(['en attente','inactif','actif','gestionnaire']),
            'nom'=>$this->faker->lastname(),
            'prenom'=>$this->faker->firstname(),
            'date_naissance'=>$this->faker->date(),
            'email'=>$this->faker->unique->safeEmail(),
            'mot_de_passe'=>'pw',
            'adresse'=>$this->faker->address(),
            'code_postal'=>$this->faker->postcode(),
            'ville'=>$this->faker->city(),
            'reception_newsletter'=>$this->faker->boolean()

        ];
    }
}
