<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->input('language');

        $books = Book::where('name', 'LIKE', '%' . $request->input('query') . '%')
            ->where('rating', '>=', $request->input('rating') ? $request->input('rating') : 0)
            ->where('genre', 'LIKE', '%' . $request->input('genre') . '%');
        if ($language) {
            $books->where(function ($query) use ($language) {
                for ($i = 0; $i < count($language); $i++) {
                    $query->orWhere('language', 'like', '%' . $language[$i] . '%');
                }
            });
        }

        $books = $books->paginate(10);

        foreach ($books as $book) {
            $book->getReviews;
        }

        return view('pages.home', ['books' => $books]);
    }
}
