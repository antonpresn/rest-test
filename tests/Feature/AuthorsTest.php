<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAuthors()
    {
        $response = $this->get('/authors');

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
    public function testGetAuthor()
    {
        $response = $this->get('/author/1');

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
    public function testCreateAuthor()
    {
        $response = $this->post('/author');

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
    public function testUpdateAuthor()
    {
        $response = $this->post('/author');

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
    public function testDeleteAuthor()
    {
        $response = $this->post('/author');

        $response
	        ->assertStatus(200)
	        ->assertJson([

	        ]);
    }

    
}
