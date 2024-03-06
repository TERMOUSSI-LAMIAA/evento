<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categories;
use App\Models\Evenements;
use App\Models\Users;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EvenementsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
            'lieu' => $this->faker->city,
            'duree' => $this->faker->numberBetween(1, 24),
            'nbr_places' => $this->faker->numberBetween(1, 100),
            'acceptation' => $this->faker->randomElement(['automatique', 'manuelle']),
            'is_valid' => $this->faker->boolean,
            'img' => $this->faker->imageUrl(),
            'prix' => $this->faker->randomFloat(2, 0, 100),
            'categorie_id' => Categories::factory()->create()->id,
            'organisateur_id' => null,
        ];
    }
}
