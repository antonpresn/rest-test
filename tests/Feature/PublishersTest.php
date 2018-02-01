<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishersTest extends TestCase
{
    /**
     * тест коллекции 
     *
     * @return void
     */
    public function testGetPublishers()
    {
        $response = $this->get('/pulbishers');
        $Publishers = App\Publisher::select(['id', 'name'])
               ->orderBy('name', 'desc')
               ->take(10)
               ->get(); 


       	$response
       	->assertStatus(200)
       	->assertJson($Publishers->toArray());
    }

    /**
     * тест 1 книги 
     *
     * @return void
     */
    public function testGetPublisher()
    {
        $response = $this->get('/pulbisher/1');
        $Publisher = App\Publisher::where('id', 1)
        		->first()
                ->get(); 

        $response
	        ->assertStatus(200)
	        ->assertJson($Publisher->toArray());
    }

    /**
     * тест создания 
     *
     * @return void
     */
    public function testCreatePublisher()
    {
    	$PublisherData = $this->publisherData();
        $response = $this->post('/pulbisher', $PublisherData);

		$this->assertDatabaseHas('publishers', $PublisherData);

        // $response
	        // ->assertStatus(200);
    }

    /**
     * тест обновления
     *
     * @return void
     */
    public function testUpdatePublisher()
    {
    	$PublisherData = $this->publisherData();
    	$PublisherBefore = App\Publisher::where('id', 1)
    					->first()
    					->get();
        $response = $this->put('/pulbisher/1', $PublisherData);
		$this->assertDatabaseHas('publishers', $PublisherData);
		$this->assertNotEquals($PublisherBefore->name, $PublisherData['name'])

    }

     /**
     * тест удаления 
     *
     * @return void
     */
    public function testDeletePublisher()
    {
    	$PublisherBefore = App\Publisher::where('id', 1)
    					->first()
    					->get();

    	$this->assertNotEmpty($PublisherBefore);
        $response = $this->delete('/pulbisher/1');
		$this->assertDatabaseMissing('publishers', $PublisherBefore->toArray());

    }

    /**
     * тестовые данные
     * @return array 
     */
    private function publisherData()
    {
     	return [
    		'name' => 'Волшебник ' . \time(),
    	];   
	}
}