<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Auth;
use Validator;
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

        return view('templates.review', ['reviews' => $reviews, 'book' => $book])->render();
    }

    public function store($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'message' => 'nullable|string|max:100',
            'rating' => 'numeric',
        ]);

        if($validator->fails()) {
            return response()->json(['message' => $validator->messages()->get('*')], 500);
        }

        $item = OrderItems::whereId($id)->where('user_id', Auth::user()->id)->firstOrFail();

        $review = BookReview::where('book_id', $item->book_id)->where('user_id', Auth::user()->id)->first();

        if($review) {
            $review->update([
                'message' => $request->input('message'),
                'rating' =>  $request->input('rating'),
            ]);
            return response()->json(['message' => 'updated'], 200);
        } else {
            BookReview::create([
                'message' => $request->input('message'),
                'rating' =>  $request->input('rating'),
                'book_id' => $item->book_id,
                'user_id' => Auth::user()->id,
             ]);
        }

        return response()->json(['message' => 'created'], 200);
    }

    public function show($id) {
        $items = OrderItems::where('order_id', $id)->get();
        foreach($items as $item) {
            $item->getBookDetails;
        }

        return view('pages.create_review', ['items'=> $items]);
    }
}
