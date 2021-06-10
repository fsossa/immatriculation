<?php

namespace Database\Factories;

use App\Models\Modele;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modele::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'marque' => $this->faker->company(),
            'model' => $this->faker->company(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Modele $modele) {
            //
        })->afterCreating(function (Modele $modele) {
            //
        });
    }
}
