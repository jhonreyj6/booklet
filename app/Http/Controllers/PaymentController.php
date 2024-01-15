<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use Auth;

class PaymentController extends Controller
{
    public function create($id)
    {
        $order = Order::whereId($id)->where('user_id', Auth::id())->firstOrFail();
        $items = DB::table('books')->whereIn('id', json_decode($order->order_items_id))->get();

        return view('pages.payment', ['items' => $items, 'order' => $order, 'intent' => auth()->user()->createSetupIntent()]);
    }

    public function singleCharge($id, Request $request)
    {

        $order = Order::whereId($id)->where('user_id', Auth::id())->firstOrFail();
        $books = Book::whereIn('id', json_decode($order->order_items_id))->get();
        foreach ($books as $book) {
            $book->quantity = 1;
        }

        return $request->user()->checkout([implode(",", $books->pluck('stripe_price_id', 'quantity')->toArray())], [
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
