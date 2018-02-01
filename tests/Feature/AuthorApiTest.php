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
	use DatabaseMigrations, RefreshDatabase, ApiTest;

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


}
