<?php

namespace Database\Factories;

use App\Models\Directory;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Directory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre_fr' => $this->faker->sentence,
            'titre_en' => $this->faker->sentence,
            'date' => $this->faker->date(),
            'file' => $this->faker->word . '.' . $this->faker->randomElement(['pdf', 'zip', 'doc']),
            'etudiant_id' => Etudiant::factory(),
        ];
    }
}
