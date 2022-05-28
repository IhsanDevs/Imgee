<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_name' => $this->faker->word,
            'url' => $this->faker->url,
            'token' => $this->faker->unique()->uuid,
            'user_id' => $this->faker->randomElement([$this->faker->numberBetween(0, User::all()->count()), \null])
        ];
    }
}