<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Publisher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Публикации - связи Издательств и Книг
 * В данном классе приведены их тесты
 * 
 */
class PublicationApiTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->seed('PublicationDatabaseSeeder');
    }
    /**
     * публикации
     * 
     */
    public function testGetAllPublications()
    {
        $all = Publisher::get();
        $response = $this->get('/api/publications');

        $response
        ->assertStatus(200);
        // @todo
        // ->assertJson(['data' => ]);
    }

    /**
     * одна публикация 
     * 
     */
    public function testGetOnePublication()
    {
        $all = Publisher::find(1);
        $pid = 1;
        $bid = 1;
        $response = $this->get('/api/publications/'.$pid.'_'.$bid);

        $response
        ->assertStatus(200)
        ->assertJson(['data' => ['publisher_id'=>$pid, 'book_id'=>$bid]]);
    }
}
