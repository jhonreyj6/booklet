<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request) {
        $book = Book::whereId($request->input('id'))->firstOrFail();

        if($request->input('rating')) {
            $reviews = BookReview::where('book_id', $book->id)
                ->where('rating', '=',  $request->input('rating'))
                ->paginate(6);
        } else {
            $reviews = BookReview::where('book_id', $book->id)
                ->paginate(6);
        }

        $view = view('templates.review', ['reviews' => $reviews, 'book' => $book])->render();
        return $view;
    }
}
