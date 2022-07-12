<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $input = array("admin", "editor", "viewer");
        return [
            'name' => $input[array_rand($input,1)],
            'description' => $this->faker->paragraph(rand(1, 3))
        ];
    }
}
