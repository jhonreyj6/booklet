<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use DB;

class OrderInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $order = Order::whereId($request->input('id'))->where('user_id', Auth::id())->firstOrFail();
        // foreach ($order->order_items_id as $key => $value) {
        //     $order->getBookDetails;
        // }
        // return $order;

        $order = DB::table('orders')->where('id', $request->input('id'))->where('user_id', Auth::id())->first();

        $order->getBookDetails = DB::table('books')->whereIn('id', json_decode($order->order_items_id))->get();

        return view('pages.invoice', ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
