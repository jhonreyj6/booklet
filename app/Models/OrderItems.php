<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\BookReview;
use Auth;
class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'user_id',
        'order_id',
        'book_id',
        'price',
    ];

    public function getBookDetails() {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function getOrderDetails() {
        return $this->hasMany('App/Model/Order', 'id', 'order_id');
    }

    public function getAuthReviews() {
        return $this->hasOne(BookReview::class, 'book_id', 'book_id')->where('user_id', Auth::id());
    }
}
