<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\ApiTest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Тест api Книга
 */
class BookApiTest extends TestCase
{
	use DatabaseMigrations, RefreshDatabase, ApiTest;

	/**
	 * класс тестируемой сущности
	 * 
	 * @return string 
	 */
	private $entityClass = 'App\\Book';


	/**
	 * Пути к различным категориям сущности
	 * 
	 * @var array
	 */
	private $routes = ['all' => '/books', 'one' =>'/book'];

}