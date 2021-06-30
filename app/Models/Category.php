<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Book;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'sub_name',
        'name',
    ];

    // public function book()
    // {
    //     return $this->belongsTo(Book::class, 'category');
    // }

    public function books()
   {
       return $this->hasMany(Book::class);

   }

   
}
