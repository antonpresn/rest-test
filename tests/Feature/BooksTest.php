<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetBooks()
    {
        $response = $this->get('/books');

        $response
	        ->assertStatus(200)
	        ->assertJson([

	        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetBook()
    {
        $response = $this->get('/book/1');

        $response
	        ->assertStatus(200)
	        ->assertJson([

	        ]);
    }

     /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateBook()
    {
        $response = $this->post('/book');

        $response
	        ->assertStatus(200)
	        ->assertJson([

	        ]);
    }

     /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateBook()
    {
        $response = $this->post('/book');

        $response
	        ->assertStatus(200)
	        ->assertJson([

	        ]);
    }

     /**
     * A basic test example.
     *
     * @return void
     */
    public function testDeleteBook()
    {
        $response = $this->post('/book');

        $response
	        ->assertStatus(200)
	        ->assertJson([

	        ]);
    }

    
}
