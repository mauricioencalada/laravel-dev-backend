<?php

namespace Database\Factories\Cecy;

use App\Models\Cecy\Catalogue;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Catalogue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'name' => $this->faker->word,
            'type' => $this->faker->word,
            'icon' => $this->faker->word,
            'state_id' => 1,
        ];
    }
}
