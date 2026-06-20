<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = \App\Models\Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{

    return [
        'first_name' => fake()->firstName(),
        'last_name'  => fake()->lastName(),
        'email'      => fake()->unique()->safeEmail(),
        'phone'      => fake()->phoneNumber(),
        'address'    => fake()->address(),
        'salary'     => fake()->numberBetween(500000,5000000),
    ];
}
}
