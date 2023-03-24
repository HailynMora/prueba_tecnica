<?php

namespace Database\Factories;

use App\Models\Bodega;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BodegaFactory extends Factory
{
    protected $model = Bodega::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
