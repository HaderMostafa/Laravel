<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            'user_id' => User::all()->random()->id , 
            'created_at' => now(),
        ];
    }
}
