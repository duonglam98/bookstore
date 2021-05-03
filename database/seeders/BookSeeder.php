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
            'price' => 500,
            'quantity' => 100,
            'description' => 'Horror',
        ]);
    }
}
