<?php

namespace Database\Factories\Cecy;

use App\Models\Cecy\Institution;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstitutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Institution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'name' => $this->faker->text($maxNbChars = 25),
            'slogan' => $this->faker->word,
            'state_id' => 1,
        ];
    }
}
