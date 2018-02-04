<?php

namespace Tests\Traits;

/**
 * трейт со стандартными тестами api
 * 
 * класс включающий должен иметь следующие свойства
 * private $entityClass
 * private $routes = ['all' => '', 'one' =>]
 * 
 */
trait ApiTest
{
    /**
     * Префикс api по умолчанию
     * 
     * @var string
     */
	private $apiPrefix = '/api';

    /**
     * тест коллекции 
     * 
     * @dataProvider providerTestGetAll
     * @return void
     */
    public function testGetAll($hdrs = [], $count = 20)
    {
    	$all = factory($this->entityClass, $count)->create();

        $response = $this->get($this->r(), $hdrs);
        // fwrite(STDERR, $all);

       	$response
       	->assertStatus(200)
       	->assertJson(['data' => $all->toArray()]);
    }

    /**
     * тест 1 
     *
     * @dataProvider providerTestGetOne
     * @return void
     */
    public function testGetOne($count = 5)
    {
    	$all = factory($this->entityClass, $count)->create();
    	$one = $all->all()[$count - 1];

        $response = $this->get($this->r("/".$one->id));
        $response
	        ->assertStatus(200)
	        ->assertJson(['data' => $one->toArray()]);
    }

    /**
     * тест создания 
     *
     * @return void
     */
    public function testCreateOne()
    {
    	$one = factory($this->entityClass)->make();
        $response = $this->postJson($this->r(), $one->toArray());

		$this->assertDatabaseHas($one->getTable(), $one->toArray());

        // $response
	        // ->assertStatus(200);
    }

    /**
     * тест обновления
     *
     * @dataProvider providerUpdateOne
     * @return void
     */
    public function testUpdateOne($attrs = null, $method = 'put', $assertMethod = 'assertDatabaseHas')
    {
    	$one = is_array($attrs) ? 
                factory($this->entityClass)->make($attrs) :
                factory($this->entityClass)->make();

    	// fwrite(STDERR, print_r($one, 1));
    	$before = factory($this->entityClass)->create();
        $id = $before->id;

        $data = array_filter($one->toArray());
        $dataAssert = array_merge($data, ['id' => $id]);
		$this->assertDatabaseMissing($one->getTable(), $dataAssert);
        $response = $this->{$method.'Json'}($this->r('/'.$id), $data);

		$this->$assertMethod($one->getTable(), $dataAssert);

    }

     /**
     * тест удаления 
     *
     * @return void
     */
    public function testDeleteOne()
    {
    	$before = factory($this->entityClass)->create();
    	// fwrite(STDERR, \get_class($before));
    	// fwrite(STDERR, ($before->id));
    	// fwrite(STDERR, $before);
        $response = $this->delete($this->r('/'.$before->id));
		$this->assertDatabaseMissing($before->getTable(), $before->toArray());

    }

    /**
     * получает путь до требуемого api 
     * использует $this->routes
     * 
     * @param $suffix string Опцонально. Добавляется к пути. по умолчанию ''  
     * @param $type string Опцонально. по умолчанию 'all' 
     * @return string 
     */
	private function r($suffix = '', $type = 'all') 
	{
		$r = $this->apiPrefix.$this->routes[$type].$suffix;	
		// fwrite(STDERR, $r);
		return $r;
	}

	/**
	 * провайдер для testGetAll
	 * можно переопределить в наследующем классе
	 * 
	 * @return array 
	 */
	public function providerTestGetAll()
	{
		return [[]];
	}

	/**
	 * провайдер для testGetOne
	 * можно переопределить в наследующем классе
	 * 
	 * @return array 
	 */
	public function providerTestGetOne()
	{
		return [[]];
	}

    /**
     * Провайдер для testUpdateOne
     * можно переопределить в наследующем классе
     * 
     * @return array 
     */
	public function providerUpdateOne()
	{
		return [[]];
	}
}