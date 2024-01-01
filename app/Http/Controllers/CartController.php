<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    public function index() {
        $carts = Cart::paginate(10);
        foreach($carts as $cart) {
            $cart->getBookDetails;
        }

        return view('pages.cart', ['carts' => $carts]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'exists:books,id'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('danger', 'Something Went Wrong! Please Check the Field...');
        }

        $cart = Cart::whereId($request->input('id'))->first();
        if($cart) {
            $cart->quantity = $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $request->input('id'),
                'quantity' => 1,
            ]);
        }

        return response()->json(['message' => 'success'], 200);
    }
}
