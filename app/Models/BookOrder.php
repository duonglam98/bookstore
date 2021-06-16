<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class BookOrder extends Model
{
    use HasFactory;

    protected $table = 'book_orders';
    protected $fillable = [
        'book_id',
        'order_id',
        'quantity',
        'price',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
