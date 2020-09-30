<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Adventure', 'description' => 'The Adventure genre has been a staple in epic filmmaking from the beginning of cinema.']);
        Category::create(['name' => 'Humor', 'description' => 'Historically, the Humor genre has been a favorite attraction for audiences of all ages.']);
        Category::create(['name' => 'Drama', 'description' => 'Drama Films are serious presentations or stories with settings or life situations that portray realistic characters in conflict with either themselves, others, or forces of nature.']);
        Category::create(['name' => 'Fantasy', 'description' => 'Fantasy films are films that belong to the fantasy genre with fantastic themes, usually magic, supernatural events, mythology, folklore, or exotic fantasy worlds.']);
        Category::create(['name' => 'Horror', 'description' => 'The horror genre dates back to the early days of cinema, and continues to be a treasured pastime.']);
        Category::create(['name' => 'Mystery', 'description' => 'A mystery film is a genre of film that revolves around the solution of a problem or a crime.']);
        Category::create(['name' => 'Romance', 'description' => 'The romance genre has underlying themes that branch into every single film genre.']);
        Category::create(['name' => 'Thriller', 'description' => 'The thriller genre encapsulates the audience’s curiosity and reservations dealing with governmental conspiracy theory.']);
        Category::create(['name' => 'Dystopian', 'description' => 'The Dystopian genre has been reinterpreted, as well as reinvented, throughout the history.']);
    }
}
