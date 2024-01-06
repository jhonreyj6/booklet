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
        if(!$cart) {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $request->input('id'),
            ]);
        }

        return response()->json(['message' => 'success'], 200);
    }

    public function destroy(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'exists:carts,id'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('danger', 'Something Went Wrong! Please Check the Field...');
        }

        $cart = Cart::whereId($request->input('id'))->firstOrFail();
        $cart->delete();

        return response()->json(['message' => 'success'], 200);
    }
}
