<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Category;
use app\Models\Wishlist;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        
        'user_id',
        'name',
        'author',
        'category',
        'category_id',
        'code',
        'price',
        'quantity',
        'description',
        'image',
        'reviews',
        'weight',
        'NXB',
        'status',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'book_orders');
    }

    public function category(){
        return $this->belongsTo(Category::class);
      }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
   
}
