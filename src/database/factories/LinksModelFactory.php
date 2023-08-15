<?php

namespace Database\Factories;

use App\Models\linksModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LinksModelFactory extends Factory
{
    protected $model = linksModel::class;

    public function definition()
    {
        return [
            'short' => $this->faker->word(),
            'source_url' => $this->faker->url(),
            'available_until' => Carbon::now(),
            'allowed_number_of_uses' => $this->faker->randomNumber(),
            'number_of_uses' => $this->faker->randomNumber(),
        ];
    }
}
