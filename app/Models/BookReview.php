<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BookReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'message',
    ];

    protected $table = 'book_reviews';

    public function getUserDetails() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
