<?php

namespace App\Http\Controllers;

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
        $stripePriceId = 'price_deluxe_album';

        return $request->user()->checkout([$stripePriceId => 1], [
            'success_url' => route('checkout-success'),
            'cancel_url' => route('checkout-cancel'),
        ]);
    }

    public function successPayment(Request $request) {
        return view('pages.payment_success');
    }

    public function cancelPayment(Request $request) {
        return view('pages.payment_cancel');
    }
}
