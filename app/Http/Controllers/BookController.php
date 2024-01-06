<?php

namespace App\Http\Controllers;

use App\Models\BookReview;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Book;
use Auth;


class BookController extends Controller
{
    public function index(Request $request) {
        $book = Book::whereId($request->input('id'))->firstOrFail();
        $cart = Cart::where('user_id', Auth::id())->where('book_id', $book->id)->first();

        if($cart) {
            $book->authAdded = true;
        } else {
            $book->authAdded = false;
        }

        return (String) view('pages.book', ['book' => $book])->render();
    }
}
