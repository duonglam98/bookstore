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
            'user_id' => 1,
            'name' => 'Harry Porter',
            'author' => 'J. K. Rowling',
            'code' => '0001',
            'price' => 500,
            'quantity' => 100,
            'description' => 'Horror',
            'images' => '',
            'weight' => '1.5',
            'NXB'=> 'Bloomsbury',
        ]);
    }
}
