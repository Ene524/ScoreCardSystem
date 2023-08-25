<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'department_id' => $this->faker->numberBetween(1, 10),
            'position_id' => $this->faker->numberBetween(1, 10),
            'salary_id' => $this->faker->numberBetween(1, 10),
            'employment_date' => $this->faker->dateTimeBetween('-5 years', 'now'),

        ];
    }
}
