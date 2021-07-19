<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use app\Models\Book;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = "wishlists";

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function book(){
    return $this->belongsTo(Book::class);
    }
}
