<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use App\Models\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /*
         * Auth - Custom Guards
         */
        /*Auth::extend('jwt', function (Application $app, string $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
            return new JwtGuard(Auth::createUserProvider($config['provider']));
        });*/
        /*Auth::viaRequest('custom-token', function (Request $request) {
            return User::where('token', (string) $request->token)->first();
        });*/
        /*
         * Custom Providers
         */
        /*Auth::provider('mongo', function (Application $app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...

            return new MongoUserProvider($app->make('mongo.connection'));
        });*/

        /**
         * Authorization
         */
        $this->registerPolicies();
        Gate::define('admin-update-article', function (Admin $admin, Article $article) {
            return $admin->id === $article->user_id;
        });

        // Supplying Additional Context
        /*Gate::define('create-article', function (User $user, Category $category, bool $pinned) {
            if (!$user->canPublishToGroup($category->group)) {
                return false;
            } elseif ($pinned && !$user->canPinPosts()) {
                return false;
            }
            return true;
        });
        if (Gate::check('create-article', [$category, $pinned])) {
            // The user can create the article...
        }*/

        // Gate Responses
        /*Gate::define('edit-settings', function (User $user) {
            return $user->isAdmin
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });*/

        // Customizing The HTTP Response Status
        /*Gate::define('edit-settings', function (User $user) {
            return $user->isAdmin
                ? Response::allow()
                : Response::denyWithStatus(404);
        });
        Gate::define('edit-settings', function (User $user) {
            return $user->isAdmin
                ? Response::allow()
                : Response::denyAsNotFound();
        });*/

        // Intercepting Gate Checks
        /*Gate::before(function (User $user, string $ability) {
            if ($user->isAdministrator()) {
                return true;
            }
        });
        Gate::after(function (User $user, string $ability, bool|null $result, mixed $arguments) {
            if ($user->isAdministrator()) {
                return true;
            }
        });*/

        // Inline Authorization
        /*Gate::allowIf(fn (User $user) => $user->isAdministrator());
        Gate::denyIf(fn (User $user) => $user->banned());*/

        // Policy Auto-Discovery
        Gate::guessPolicyNamesUsing(function (string $modelClass) {
            // Return the name of the policy class for the given model...
        });

        //Gate::define('update-post', [ArticlePolicy::class, 'update']);
    }
}
