<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'address' => $this->faker->paragraphs(3, 5),
            'birthday' => $this->faker->date(),
            'avatar' => $this->faker->name(),
            'user_id' =>  User::factory()->create()->id
        ];
    }
}
