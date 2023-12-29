<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function index(Request $request) {
        $books = Book::where('name', 'LIKE', '%' . $request->input('query') .'%')
                    ->where('rating', '>=', $request->input('rating') ? $request->input('rating') : 0)
                    ->where('genre', 'LIKE', '%' . $request->input('genre') .'%')
                    ->where('language', 'LIKE', '%' . $request->input('language') .'%')
                    ->paginate(10);

        return view('pages.search', ['books' => $books]);
    }
}
