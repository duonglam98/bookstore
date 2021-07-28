<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'code',
        'user_id',
        'user_name',
        'phone',
        'address',
        'total_price',
        'payments',
        'status',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_orders');
    }

    
}
