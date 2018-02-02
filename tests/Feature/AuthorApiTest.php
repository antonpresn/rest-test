<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\ApiTest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Тест api Автор
 */
class AuthorApiTest extends TestCase
{
	use DatabaseMigrations, RefreshDatabase;
	use ApiTest {
		ApiTest::testCreateOne as private createOne;
		ApiTest::testUpdateOne as private updateOne;
	}

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

    /**
     * тест создания 
     *
     * @return void
     */
    public function testCreateOne()
    {

    	$this->createOne();
    }

    /**
     * тест обновления 
     *
     * @return void
     */
    public function testUpdateOne()
    {
    	$this->updateOne();
    }
   
}
