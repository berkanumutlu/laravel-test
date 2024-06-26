<?php
// php artisan make:factory Article
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->name;
        return [
            'title'       => $title,
            'slug'        => Str::slug($title),
            'body'        => fake()->paragraph,
            'is_active'   => fake()->boolean,
            'category_id' => random_int(1, 10),
        ];
    }
}
