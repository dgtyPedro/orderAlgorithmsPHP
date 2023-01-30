<?php

namespace Database\Factories;

use App\Models\Root;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExternalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $root = Root::inRandomOrder()->first();
        return [
            'value' => rand(2,50),
            'root_id' => $root->id,
        ];
    }
}
