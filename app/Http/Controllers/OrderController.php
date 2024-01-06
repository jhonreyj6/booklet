<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use Validator;
use App\Models\OrderItems;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->paginate(10);
        foreach($orders as $order) {
            $order->displayItem = Book::whereIn('id', $order->order_items_id)->first();
        }

        return view('pages.order', ['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cart_items_id.*' => 'exists:carts,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('danger', 'Something Went Wrong!');
        }

        $carts = Cart::whereIn('id', $request->input('cart_items_id'))->get();

        $order = Order::create([
           'user_id' => Auth::id(),
           'status' => 0,
           'order_items_id' => json_encode($carts->pluck('book_id')),
        ]);

        foreach ($carts as $cart) {
            OrderItems::create([
                'user_id' => Auth::id(),
                'book_id' => $cart->book_id,
                'order_id' => $order->id,
            ]);
            $cart->delete();
        }

        return redirect('/order');
    }
}
