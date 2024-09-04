<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use Illuminate\Support\Str;

uses(
    Tests\TestCase::class,
// Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

function createUser(): \App\Models\User
{
    return \App\Models\User::factory()->create();
}

function createAdmin(): \App\Models\Admin
{
    return \App\Models\Admin::factory()->create();
}

function createArticle(): \App\Models\Article
{
    $title = fake()->name;
    $article = \App\Models\Article::create([
        'language_id' => 2,
        'title'       => $title,
        'slug'        => Str::slug($title),
        'body'        => fake()->paragraph,
        'is_active'   => 1,
        'category_id' => 1
    ]);
    $last_record = \App\Models\Article::query()->select(['language_group_id'])
        ->orderBy('language_group_id', 'desc')->first();
    if (!empty($last_record)) {
        $language_group_id = $last_record->language_group_id + 1;
    } else {
        $language_group_id = 1;
    }
    $article->update(['language_group_id' => $language_group_id, 'sort' => $language_group_id]);
    return $article;
}
