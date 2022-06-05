<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'nis'  => $this->faker->numberBetween(2020000000, 2020999999),
                'name' => $this->faker->name(),
                'address' => $this->faker->state(),
                'date_of_birth' => $this->faker->date(),
                'gender' => 'Laki-laki',
                'wali' => $this->faker->name(),
                'room_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
