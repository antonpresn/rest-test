<?php

namespace Tests\Traits;

/**
 * трейт со стандартными тестами api
 */
trait ApiTest
{
	/** 
	 * класс включающий должен иметь следующие свойства
	 * private $entityClass
	 * private $routes = ['all' => '', 'one' =>]
	 * 
	 */

    /**
     * тест коллекции 
     *
     * @return void
     */
    public function testGetAll($hdrs = [], $count = 20)
    {
    	$all = factory($this->entityClass, $count)->create();
        $response = $this->getJson($this->routes['all'], $hdrs);

       	$response
       	->assertStatus(200)
       	->assertJson($all->toArray());
    }

    /**
     * тест 1 
     *
     * @return void
     */
    public function testGetOne($count = 5)
    {
    	$all = factory($this->entityClass, $count)->create();
    	$one = $all->all()[$count - 1];

        $response = $this->getJson($this->routes['one']."/".$one->id);
        $response
	        ->assertStatus(200)
	        ->assertJson($one->toArray());
    }

    /**
     * тест создания 
     *
     * @return void
     */
    public function testCreateOne()
    {
    	$one = factory($this->entityClass)->make();
        $response = $this->post($this->routes['one'], $one->toArray());

		$this->assertDatabaseHas($one->getTable(), $one->toArray());

        // $response
	        // ->assertStatus(200);
    }

    /**
     * тест обновления
     *
     * @return void
     */
    public function testUpdateOne()
    {
    	$one = factory($this->entityClass)->make();
    	// fwrite(STDERR, print_r($one, 1));
    	$before = factory($this->entityClass)->create();
		$this->assertDatabaseMissing($one->getTable(), $one->toArray());
        $response = $this->put($this->routes['one'].'/'.$before->id, $one->toArray());

		$this->assertDatabaseHas($one->getTable(), $one->toArray());

    }

     /**
     * тест удаления 
     *
     * @return void
     */
    public function testDeleteOne()
    {
    	$before = factory($this->entityClass)->create();
        $response = $this->delete($this->routes['one'].'/'.$before->id);
		$this->assertDatabaseMissing($before->getTable(), $before->toArray());

    }

}