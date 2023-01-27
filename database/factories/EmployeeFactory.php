<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'birth_date' => fake()->dateTimeBetween( '-40 years', '-25 years' ),
            'salary' => fake()->randomElement( array (5000, 7000, 10000, 12000, 15000, 20000, 25000, 30000) ), // 5000
            'salary_day' => fake()->dayOfMonth('now'),
            'user_id' => User::inRandomOrder()->first(),
            // 'salary_day' => fake()->dateTimeBetween( '-5 years', '-1 years' ),

        ];
    }
}
