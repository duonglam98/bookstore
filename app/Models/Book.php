<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'user_id',
        'name',
        'author',
        'code',
        'price',
        'quantity',
        'description',
        'images',
        'rate',
        'weight',
        'NXB',
        'status',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'book_orders');
    }
}
