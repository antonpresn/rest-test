<?php

use Illuminate\Database\Seeder;
use App\Publisher;
use App\Book;

class PublicationDatabaseSeeder extends Seeder
{
    /**
     * Run the publication database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = factory(Publisher::class, 3)->create()->each(function($publisher) {
             factory(Book::class, rand(1,3))->make()->each(function($book) use($publisher) {

                $publisher->books()->save($book);
            });
        });
  
    }
}
