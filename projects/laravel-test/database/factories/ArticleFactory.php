<?php
// php artisan make:factory Article
namespace Database\Factories;

use App\Models\Article;
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
            'language_id' => random_int(1, 8),
            'title'       => $title,
            'slug'        => Str::slug($title),
            'body'        => fake()->paragraph,
            'is_active'   => fake()->boolean,
            'category_id' => random_int(1, 10),
        ];
    }

    /**
     * @return Factory|ArticleFactory
     */
    public function configure(): Factory|ArticleFactory
    {
        return $this->afterCreating(function (Article $article) {
            try {
                $last_record = Article::query()->select(['language_group_id'])
                    ->orderBy('language_group_id', 'desc')->first();
                if (!empty($last_record)) {
                    $language_group_id = $last_record->language_group_id + 1;
                } else {
                    $language_group_id = 1;
                }
                $article->update(['language_group_id' => $language_group_id, 'sort' => $language_group_id]);
                //TODO: Dil sayısı kadar mevcut kayıt çoklanacak.
            } catch (\Exception $e) {
                //TODO: Log tablosuna hata mesajı eklenecek.
            }
        });
    }
}
