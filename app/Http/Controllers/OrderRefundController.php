<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class OrderRefundController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 3)->where('user_id', Auth::id())->paginate(10);
        foreach($orders as $order) {
            $order->displayItem = Book::whereIn('id', $order->order_items_id)->first();
        }


        return view('pages.order', ['orders' => $orders]);
    }
}
