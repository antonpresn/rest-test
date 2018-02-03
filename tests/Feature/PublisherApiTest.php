<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\ApiTest;
use App\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Тест api издательство
 */
class PublisherApiTest extends TestCase
{
	use DatabaseMigrations, RefreshDatabase, ApiTest;

	/**
	 * класс тестируемой сущности
	 * 
	 * @return string 
	 */
	private $entityClass = 'App\\Publisher';


	/**
	 * Пути к различным категориям сущности
	 * 
	 * @var array
	 */
	private $routes = ['all' => '/publishers', 'one' =>'/publisher'];

    /**
     * Тест выборки списка книг издательства (связей с книгами издательства)
     * GET /publishers/{publisher}/books
     * 
     */
    public function testGetPublisherBooks ()
    {
        $all = $this->seedPublications();

        $first = $all->first();
        $id = $first->id;

        $response = $this->get($this->r('/'.$id.'/books'));
        $mapper = function ($v) {
            return ['book_id' => $v];
        };
        $books = $first->books()->allRelatedIds()->map($mapper);
        $response->assertJson(['data' => $books]);
    }

    /**
     * добавление связи с книгой 
     * PUT /publishers/{publisher}/books/{book} 201 Created|302 Found; Location /publications/{uid}
     * 
     */
    public function testPutPublisherBook ()
    {
        $all = $this->seedPublications();

        $first = $all->first();
        $id = $first->id;
        $newBook = factory(Book::class)->create();
        $bookId = $newBook->id;

        $response = $this->put($this->r('/'.$id.'/books/'.$bookId));
        $publicationAssert = [
            'data' => [
                'book_id' => $bookId,
                'publisher_id' => $id,
            ]
        ];
        $response->assertStatus(204)
                ->assertJson($publicationAssert);

        $response = $this->put($this->r('/'.$id.'/books/'.$bookId));
        $response->assertStatus(302)
                ->assertJson($publicationAssert);
    }

    /**
     * тест удаления связи с книгой 
     * DELETE /publishers/{publisher}/books/{book} 
     * 
     */
    public function testDeletePublisherBook ()
    {
        $all = $this->seedPublications();

        $first = $all->first();
        $id = $first->id;
        $book = $first->books()->get()->first();

        $this->assertDatabaseHas($book->getTable(), $book->attributesToArray());

        $response = $this->delete($this->r('/'.$id.'/books/'.$book->id));

        $this->assertDatabaseMissing($book->getTable(), $book->attributesToArray());
    }

    /**
     * вспомогательная функция для выпуска связей книг и издательств
     * 
     * @return 
     */
    private function seedPublications()
    {
        $this->seed('PublicationDatabaseSeeder');

        $all = $this->entityClass::with('books')->get();
        return $all;
    }
}