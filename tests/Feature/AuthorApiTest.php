<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\ApiTest;
use App\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Тест api Автор
 */
class AuthorApiTest extends TestCase
{
	use DatabaseMigrations, RefreshDatabase;
	use ApiTest;
	//  {
	// 	ApiTest::testCreateOne as private createOne;
	// 	ApiTest::testUpdateOne as private updateOne;
	// }

	/**
	 * класс тестируемой сущности
	 * 
	 * @return string 
	 */
	private $entityClass = 'App\\Author';

	/**
	 * Пути к различным категориям сущности
	 * 
	 * @var array
	 */
	private $routes = ['all' => '/authors', 'one' =>'/author'];


	public function providerUpdateOne()
	{
        $one = [];
        $two = ['firstname' => false];
        return [
            // полное обновление
            [$one, 'put', 'assertDatabaseHas'],
            // частичное обновление не проходит с put
            [$two, 'put', 'assertDatabaseMissing'],
            // частичное обновление проходит с patch
            [$two, 'patch', 'assertDatabaseHas'],

        ];

    }

}
