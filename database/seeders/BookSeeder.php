<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();

        Book::create([
            'user_id' => '1',
            'name' => 'Harry Porter',
            'author' => 'J. K. Rowling',
            'category' => 'Văn học nước ngoài',
            'code' => '0001',
            'price' => 140000,
            'quantity' => 100,
            'description' => 'Horror',
            'image' => '277fa65c176e3551a6bd0ffd05083265.jpg',
            'reviews'=> '1',
            'weight' => '1.5',
            'NXB'=> 'Bloomsbury',
        ]);
    }
}
