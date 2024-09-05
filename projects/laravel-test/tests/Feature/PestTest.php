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

use App\Mail\UserVerificationMail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

test('test home page', function () {
    $response = $this->get(route('home'));

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

arch('Model sınıfındaki modellerin hepsi Eloquent modelinden extend edilmiş mi?')
    ->expect('App\Models')
    ->toExtend(\Illuminate\Database\Eloquent\Model::class);

it('ana sayfa içeriği snapshot ile kaydedildiği gibi olmalıdır.', function () {
    $response = $this->get(route('home'));
    expect($response)->assertStatus(200)->toMatchSnapshot();
});

test('welcome email', function () {
    Mail::fake();

    $response = $this->get(route('home'));

    $title = $response->viewData('title');
    expect($title)->toBeString(__('global.home_page'));

    $details = ['title' => $title, 'body' => 'Welcome to our website.'];
    $mailable = (new WelcomeMail($details));
    expect($mailable)
        ->toBeInstanceOf(WelcomeMail::class)
        ->render()
        ->not->toBeNull()
        ->render()
        ->toContain($title);

    Mail::to('test@example.com')->send(new WelcomeMail($details));
    Mail::assertSent(WelcomeMail::class, function ($mail) use ($title) {
        return $mail->details['title'] === $title;
    });
});

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

it('creates a fake user and sends email verification mail', function () {
    Mail::fake();
    $user = User::factory()->create([
        'email_verified_at' => null
    ]);
    $token = Str::random(60);

    Mail::to($user->email)->queue(new UserVerificationMail($user, $token));
    Mail::assertQueued(UserVerificationMail::class, function ($mail) use ($user) {
        return $mail->hasTo($user->email);
    });
});
