<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    /**
     * тест коллекции 
     *
     * @return void
     */
    public function testGetBooks()
    {
        $response = $this->get('/books');
        $books = App\Book::select(['id', 'name'])
               ->orderBy('name', 'desc')
               ->take(10)
               ->get(); 


       	$response
       	->assertStatus(200)
       	->assertJson($books->toArray());
    }

    /**
     * тест 1 книги 
     *
     * @return void
     */
    public function testGetBook()
    {
        $response = $this->get('/book/1');
        $book = App\Book::where('id', 1)
        		->first()
                ->get(); 

        $response
	        ->assertStatus(200)
	        ->assertJson($book->toArray());
    }

    /**
     * тест создания 
     *
     * @return void
     */
    public function testCreateBook()
    {
    	$bookData = [
    		'name' => 'Волшебник ' . \time();
    	];
        $response = $this->post('/book', $bookData);

		$this->assertDatabaseHas('books', $bookData);

        // $response
	        // ->assertStatus(200);
    }

    /**
     * тест обновления
     *
     * @return void
     */
    public function testUpdateBook()
    {
    	$bookData = [
    		'name' => 'Волшебник ' . \time();
    	];
    	$bookBefore = App\Book::where('id', 1)
    					->first()
    					->get();
        $response = $this->put('/book/1', $bookData);
		$this->assertDatabaseHas('books', $bookData);
		$this->assertNotEquals($bookBefore->name, $bookData['name'])

    }

     /**
     * тест удаления 
     *
     * @return void
     */
    public function testDeleteBook()
    {
    	$bookBefore = App\Book::where('id', 1)
    					->first()
    					->get();

    	$this->assertNotEmpty($bookBefore);
        $response = $this->delete('/book/1');
		$this->assertDatabaseMissing('books', $bookBefore->toArray());

    }

    
}
