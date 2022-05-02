<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'title' => ucfirst($this->faker->word()),
            'excerpt' => $this->faker->text(),
            'body' => $this->faker->text(1000),
            'published_at' => $this->faker->date('Y_m_d')
        ];
    }
}

