<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Events\Dispatcher;

class UserEventSubscriber
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }

    /**
     * Handle user login events.
     */
    public function handleUserLogin(Login $event): void
    {
    }

    /**
     * Handle user logout events.
     */
    public function handleUserLogout(Logout $event): void
    {
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            Login::class,
            [UserEventSubscriber::class, 'handleUserLogin']
        );

        $events->listen(
            Logout::class,
            [UserEventSubscriber::class, 'handleUserLogout']
        );

        /*return [
            Login::class => 'handleUserLogin',
            Logout::class => 'handleUserLogout',
        ];*/
    }
}
