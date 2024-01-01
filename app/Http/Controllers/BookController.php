<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request) {
        $book = Book::whereId($request->input('id'))->firstOrFail();

        return view('pages.book', ['book' => $book]);
    }
}
