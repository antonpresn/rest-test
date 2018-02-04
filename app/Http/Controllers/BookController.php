<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends CommonApiController
{

    /**
     * Класс сущности 
     * 
     * @var string
     */
    protected $entityClass = 'App\Book';

    /**
     * Класс ресурса
     * 
     * @var string
     */
    protected $resourceClass = 'App\Http\Resources\BookResource';

    /**
     * Класс коллекции ресурса
     * 
     * @var string
     */
    protected $collectionResourceClass = 'App\Http\Resources\BooksResource';

    // public function linksAuthors ($id)
    // {
    //     return new  
    // }
}
