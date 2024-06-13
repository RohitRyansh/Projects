<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WebType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->name(),
            'web_type_id' => fake()->randomElement(WebType::pluck('id')->toArray()),
        ];
    }
}
