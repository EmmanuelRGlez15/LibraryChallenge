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
        Book::create(['name' => 'Don Quixote', 'author' => 'Miguel de Cervantes', 'category_id' => '1', 'publication_date' => '1512-01-01', 'user_id' => 2]);
        Book::create(['name' => 'Harry Potter and The Prisoner of Azkaban', 'author' => 'J.K.Rowling', 'category_id' => '4', 'publication_date' => '1999-07-08', 'user_id' => 1]);
        Book::create(['name' => 'A Tale of Two Cities', 'author' => 'Charles Dickens', 'category_id' => '1', 'publication_date' => '1859-01-01', 'user_id' => null]);
        Book::create(['name' => 'The Lord of the Rings', 'author' => 'J. R. R. Tolkien', 'category_id' => '4', 'publication_date' => '1954-01-01', 'user_id' => null]);
        Book::create(['name' => 'Le Petit Prince', 'author' => 'Antoine de Saint-Exupéry', 'category_id' => '1', 'publication_date' => '1943-01-01', 'user_id' => null]);
        Book::create(['name' => 'Alice in Wonderland ', 'author' => 'Lewis Caroll', 'category_id' => '4', 'publication_date' => '1865-01-01', 'user_id' => null]);
        Book::create(['name' => 'Dream of the Red Chamber', 'author' => 'Cao Xueqin', 'category_id' => '7', 'publication_date' => '1754-01-01', 'user_id' => null]);
        Book::create(['name' => 'And Then There Were None', 'author' => 'Agatha Christie', 'category_id' => '8', 'publication_date' => '1939-01-01', 'user_id' => null]);
        Book::create(['name' => 'The Hobbit', 'author' => 'J. R. R. Tolkien', 'category_id' => '4', 'publication_date' => '1937-01-01', 'user_id' => null]);
        Book::create(['name' => 'The Lion, the Witch and the Wardrobe', 'author' => 'C.S. Lewis', 'category_id' => '4', 'publication_date' => '1950-01-01', 'user_id' => 1]);
    }
}
