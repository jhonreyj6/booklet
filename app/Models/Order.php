<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'order_items_id',
        'total',
    ];

    protected $casts = [
        'order_items_id' => 'array',
    ];

    protected $table = 'orders';

    public function getBookDetails() {
        return $this->hasMany('App\Models\Book', 'id', json_decode('order_items_id'));
    }
}
