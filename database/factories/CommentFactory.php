<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $txt = $this->faker->sentence(rand(1, 15), true);
        $createdAt = $this->faker->dateTimeBetween('-3 month', '-2 days');
        $data = [
            'post_id' => 1,
            'parent_id' => rand(0, 10),
            'content' => $txt,
            'is_Published' => 1,
            'published_at' => $this->faker->dateTimeBetween('-2 month', '-1 days'),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];

        return $data;
    }
}
