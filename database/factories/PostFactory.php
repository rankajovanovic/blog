<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $userIds = User::all()->pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence($nbWords = 7, $variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 1000),
            'is_published' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'user_id' =>$this->faker->randomElement($userIds)
        ];
    }
}
