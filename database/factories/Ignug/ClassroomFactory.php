<?php

namespace Database\Factories\Ignug;

use App\Models\Ignug\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classroom::class;

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
            'icon' => $this->faker->word,
            'type_id' => 1,
            
        ];
    }
}
