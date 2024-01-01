<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
    ];

    protected $table = 'carts';

    public function getBookDetails() {
        return $this->belongsTo('App\Models\Book', 'book_id', 'id');
    }
}
