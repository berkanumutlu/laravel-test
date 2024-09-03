<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test order shipping.
     */
    /*public function test_orders_can_be_shipped(): void
    {
        Event::fake();

        // Perform order shipping...

        // Assert that an event was dispatched...
        Event::assertDispatched(OrderShipped::class);

        // Assert an event was dispatched twice...
        Event::assertDispatched(OrderShipped::class, 2);

        // Assert an event was not dispatched...
        Event::assertNotDispatched(OrderFailedToShip::class);

        // Assert that no events were dispatched...
        Event::assertNothingDispatched();

        Event::assertDispatched(function (OrderShipped $event) use ($order) {
            return $event->order->id === $order->id;
        });

        Event::assertListening(
            OrderShipped::class,
            SendShipmentNotification::class
        );
    }*/

    /**
     * Test order process.
     */
    /*public function test_orders_can_be_processed(): void
    {
        Event::fake([
            OrderCreated::class,
        ]);
        //Event::fake()->except([
        //    OrderCreated::class,
        //]);

        $order = Order::factory()->create();

        Event::assertDispatched(OrderCreated::class);

        //$order = Event::fakeFor(function () {
        //    $order = Order::factory()->create();
        //
        //    Event::assertDispatched(OrderCreated::class);
        //
        //    return $order;
        //});

        // Other events are dispatched as normal...
        $order->update([...]);
    }*/
}
