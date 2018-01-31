<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetPublishers()
    {
        $response = $this->get('/publishers');

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
    public function testGetPublisher()
    {
        $response = $this->get('/publisher/1');

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
    public function testCreatePublisher()
    {
        $response = $this->post('/publisher');

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
    public function testUpdatePublisher()
    {
        $response = $this->post('/publisher');

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
    public function testDeletePublisher()
    {
        $response = $this->post('/publisher');

        $response
	        ->assertStatus(200)
	        ->assertJson([

	        ]);
    }

    
}