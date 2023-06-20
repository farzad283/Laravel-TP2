<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5, true);
        
        // Get a random etudiant_id from existing etudiants
        $Id = Etudiant::pluck('id')->random();

        return [
            'titre_fr' => ucfirst($title),
            'titre_en' => ucfirst($title),
            'contenu_fr' => $this->faker->paragraph(25),
            'contenu_en' => $this->faker->paragraph(25),
            'date_de_creation' => $this->faker->date,
            'etudiant_id' => $Id,
        ];
    }
}

