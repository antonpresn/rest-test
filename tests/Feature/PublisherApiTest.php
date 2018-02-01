<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\ApiTest;
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

	// apiGetAll($hdrs = [], $count = 20)
	// apiGetOne($count = 5)
	// apiCreateOne()
	// apiUpdateOne()
	// apiDeleteOne()
}