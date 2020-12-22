<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $userIds = User::all()->pluck('id')->toArray();
            $postIds = Post::all()->pluck('id')->toArray();

            return [
                'content' => $this->faker->text($maxNbChars = 200),
                'post_id' =>$this->faker->randomElement($postIds),
                'user_id' =>$this->faker->randomElement($userIds)
            ];
        
    }
}
