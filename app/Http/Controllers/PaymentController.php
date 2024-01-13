<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use Auth;

class PaymentController extends Controller
{
    public function create($id) {
        $order = Order::whereId($id)->where('user_id', Auth::id())->firstOrFail();
        $items = DB::table('books')->whereIn('id', json_decode($order->order_items_id))->get();

        return view('pages.payment', ['items' => $items, 'order' => $order, 'intent' => auth()->user()->createSetupIntent()]);
    }
}
