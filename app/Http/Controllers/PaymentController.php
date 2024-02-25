<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use Auth;

class PaymentController extends Controller
{
    // public function create($id)
    // {
    //     $order = Order::whereId($id)->where('user_id', Auth::id())->firstOrFail();
    //     $items = DB::table('books')->whereIn('id', json_decode($order->order_items_id))->get();

    //     return view('pages.payment', ['items' => $items, 'order' => $order, 'intent' => auth()->user()->createSetupIntent()]);
    // }

    public function singleCharge($id, Request $request)
    {
        $order = Order::whereId($id)->where('user_id', Auth::id())->firstOrFail();
        $books = Book::whereIn('id', json_decode($order->order_items_id))->get();
        $data = [];
        foreach ($books as $book) {
            $data = array_merge($data, array($book->stripe_price_id => 1));
        }

        return $request->user()->checkout($data, [
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
    }

    public function successPayment() {
        return view('pages.payment_success');
    }

    public function cancelPayment() {
        return view('pages.payment_cancel');
    }
}
