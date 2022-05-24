<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 8), true);
        $txt = $this->faker->realText(rand(1000, 3000));
        $isPublished =  1;

        $createdAt = $this->faker->dateTimeBetween('-3 month', '-2 days');

        $data = [
            'user_id' => rand(1, 5) ? 1 : 2,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $txt,
            'is_Published' => $isPublished,
            'published_at' =>  $this->faker->dateTimeBetween('-2 month', '-1 days'),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,

        ];

        return $data;
    }
}
