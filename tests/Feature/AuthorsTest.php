<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorsTest extends TestCase
{
    /**
     * тест коллекции 
     *
     * @return void
     */
    public function testGetAuthors()
    {
        $response = $this->get('/authors');
        $Authors = App\Author::select(['id', 'name'])
               ->orderBy('name', 'desc')
               ->take(10)
               ->get(); 


       	$response
       	->assertStatus(200)
       	->assertJson($Authors->toArray());
    }

    /**
     * тест получение 1 го автора
     *
     * @return void
     */
    public function testGetAuthor()
    {
        $response = $this->get('/author/1');
        $Author = App\Author::where('id', 1)
        		->first()
                ->get(); 

        $response
	        ->assertStatus(200)
	        ->assertJson($Author->toArray());
    }

    /**
     * тест создания 
     *
     * @return void
     */
    public function testCreateAuthor()
    {

    	$AuthorData = $this->authorData();
        $response = $this->post('/author', $AuthorData);

		$this->assertDatabaseHas('authors', $AuthorData);

        // $response
	        // ->assertStatus(200);
    }

    /**
     * тест обновления
     *
     * @return void
     */
    public function testUpdateAuthor()
    {
    	$AuthorData = $this->authorData();
    	$AuthorBefore = App\Author::where('id', 1)
    					->first()
    					->get();
        $response = $this->put('/author/1', $AuthorData);
		$this->assertDatabaseHas('authors', $AuthorData);
		$this->assertNotEquals($AuthorBefore->name, $AuthorData['name'])

    }

     /**
     * тест удаления 
     *
     * @return void
     */
    public function testDeleteAuthor()
    {
    	$AuthorBefore = App\Author::where('id', 1)
    					->first()
    					->get();

    	$this->assertNotEmpty($AuthorBefore);
        $response = $this->delete('/author/1');
		$this->assertDatabaseMissing('authors', $AuthorBefore->toArray());

    }

    /**
     * тестовые данные
     * @return array 
     */
    private function authorData()
    {
     	return [
    		'firstname' => 'Волшебник ' . \time(),
    		'lastname' => 'Нашего ' . \time(),
    		'secondname' => 'Двора ' . \time();
    	];   
	}
}
