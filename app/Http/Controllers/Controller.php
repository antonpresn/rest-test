<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Базовый класс для api
 * Наследуемые от него классы конфигурируются свойствами
 * $entityClass - класс сущности 
 * $resourceClass - класс ресурса
 * $collectionResourceClass - класс коллекции ресурса
 * 
 */
class Controller extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use DispatchesJobs, ValidatesRequests;

    /**
     * Класс сущности 
     * 
     * @var string
     */
    protected $entityClass;

    /**
     * Класс ресурса
     * 
     * @var string
     */
    protected $resourceClass;

    /**
     * Класс коллекции ресурса
     * 
     * @var string
     */
    protected $collectionResourceClass;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new $this->{'collectionResourceClass'}($this->entityClass::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $entity = ($this->entityClass)::create($request->json()->all());

        return new $this->{'resourceClass'}($entity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return new $this->{'resourceClass'}(($this->entityClass)::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entity = ($this->entityClass)::findOrFail($id);
        if (!$entity->update($request->json()->all())) {
        	return response()
		        	->json([
		        		'data'=>[
			        		'error' => 'entity not updated' 
			        	]], 
			        	500
			        ); 
        } else {
			return new $this->{'resourceClass'}($entity);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ($this->entityClass)::find($id)->delete();

        return 204;
    }
}
