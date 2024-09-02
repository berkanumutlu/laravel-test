<?php

namespace App\Providers;

/*use App\Events\UserRegistered;
use App\Listeners\SendEmailUserVerificationListener;*/

use App\Listeners\UserEventSubscriber;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        /*UserRegistered::class => [
            SendEmailUserVerificationListener::class
        ]*/
    ];

    protected $observers = [
        User::class => UserObserver::class
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        UserEventSubscriber::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        /*
         * Queueable Anonymous Event Listeners
         */
        /*Event::listen(
            PodcastProcessed::class,
            SendPodcastNotification::class,
        );
        Event::listen(queueable(function (PodcastProcessed $event) {
            // ...
        })->onConnection('redis')->onQueue('podcasts')->delay(now()->addSeconds(10)));
        Event::listen(queueable(function (PodcastProcessed $event) {
            // ...
        })->catch(function (PodcastProcessed $event, Throwable $e) {
            // The queued listener failed...
        }));
        Event::listen('event.*', function (string $eventName, array $data) {
            // ...
        });*/
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
