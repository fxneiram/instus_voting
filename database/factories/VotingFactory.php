<?php

namespace Database\Factories;

use App\Models\Voting;
use Illuminate\Database\Eloquent\Factories\Factory;

class VotingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'public' => $this->faker->boolean,
            'begin_at' => $this->faker->date('Y-m-d H:i:s'),
            'end_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
