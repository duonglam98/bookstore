<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'code',
        'user_id',
        'address',
        'total_price',
        'status',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_orders');
    }
}
