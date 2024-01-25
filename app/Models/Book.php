<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'author',
        'price',
        'rating',
        'stocks',
        'genre',
        'language',
        'image',
    ];

    protected $table = 'books';

    protected $casts = [
        'rating' => 'integer',
    ];

    public function getAllReviews() {
        return $this->hasMany('App\Models\BookReview', 'book_id');
    }
}
