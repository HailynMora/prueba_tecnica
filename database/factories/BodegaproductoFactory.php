<?php

namespace Database\Factories;

use App\Models\Bodegaproducto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BodegaproductoFactory extends Factory
{
    protected $model = Bodegaproducto::class;

    public function definition()
    {
        return [
			'id_producto' => $this->faker->name,
			'id_bodega' => $this->faker->name,
			'precio' => $this->faker->name,
        ];
    }
}
