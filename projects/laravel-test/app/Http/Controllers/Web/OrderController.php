<?php

namespace App\Http\Controllers\Web;

use App\Events\OrderShipped;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Request $request)
    {
        //
    }

    public function order_shipped(string $orderId)
    {
        $order = Order::findOrFail($orderId);
        event(new OrderShipped($order));
        //OrderShipped::dispatch($order);
        return view('web.order.order_shipped', compact('order'));
    }
}
