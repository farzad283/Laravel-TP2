<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'date_de_naissance' => $this->faker->date,
            'ville_id' => Ville::factory(),
            'user_id' => function () {
                return User::factory()->sameData()->create()->id;
            },
        ];
    }
}
