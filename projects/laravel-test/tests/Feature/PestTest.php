<?php

/*beforeEach(function () {

});
afterEach(function () {

});
beforeAll(function () {

});
afterAll(function () {

});*/

/*beforeEach(function () {
    $this->user = createUser();
});*/

test('test home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
test('test home page without callback function')->get('/')->assertStatus(200);
it('returns a successful response from homepage')->get('/')->assertStatus(200);

test('sum 1 + 2', function () {
    $result = (int) bcadd(1, 2);

    expect($result)->toBe(3);
});

arch('Projede herhangi bir yerde dd veya dump var mı?')
    ->expect(['dd', 'dump'])
    ->not->toBeUsed();

test('create article record', function () {
    $article = createArticle();

    $this->get(route('article.list'))
        ->assertStatus(200)
        ->assertDontSee(__('alert.articles_not_found'))
        ->assertSee($article->title)
        ->assertViewHas('records', function ($collection) use ($article) {
            return $collection->contains($article);
        });
});
