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
            'code' => 'b1',
            'price' => 500,
            'quantity' => 100,
            'description' => 'Horror',
            'images' => 'https://static.wikia.nocookie.net/harrypottervn/images/1/14/Harry_Potter_and_the_Cursed_Child_Script_Book_Cover.jpg/revision/latest?cb=20170313154642&path-prefix=vi',
            'weight' => '1.5',
            'NXB'=> 'Bloomsbury',
        ]);
    }
}
