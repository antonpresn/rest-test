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

    /**
     * @api {get} /api/books/ Зарос книг 
     * @apiName GetBooks
     * @apiGroup Books
     *
     * @apiSuccess {Object} data список книг 
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "data": [
     *              {
     *                "id": 2,
     *                "name": "Jayce asdf"
     *              }
     *          ]
     *      }
     *
   
     */
    public function index()
    {
        return parent::index();
    }

    /**
     * @api {post} /api/books/ Создание книги
     * @apiName CreateBook 
     * @apiGroup Books
     * 
     * @apiSuccess {Object} data созданная книга 
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 201 Created 
     *     {
     *          "data": {
     *              "id": 2,
     *              "name": "Jayce asdf"
     *          }
     *      }
     */
    public function store(Request $request)
    {
        return parent::store($request); 
    }

    /**
     * @api {post} /api/autors/:id Просмотр книги. 
     * @apiName GetBook 
     * @apiGroup Books
     * 
     * @apiSuccess {Object} data книга 
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 200 
     *     {
     *          "data": {
     *               "id": 2,
     *               "name": "Jayce asdf"
     *          }
     *      }
     * @apiError ResourceNotFound 
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "resource not found"
     *     }
     */
    public function show($id)
    {
        return parent::show($id); 
    }
  
    /**
     * @api {patch} /api/books/:id Изменение книги. Частичное
     * @api {put} /api/books/:id Изменение книги. Полное 
     * @apiName UpdateBook 
     * @apiGroup Books
     * 
     * @apiSuccess {Object} data книга 
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 200 
     *     {
     *          "data": {
     *                "id": 2,
     *                "name": "Jayce asdf"
     *          }
     *      }
     * @apiError ResourceNotFound 
     * @apiError BadRequest 
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "resource not found"
     *     }
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 400 Bad request
     *     {
     *       "error": "bad request"
     *     }
     */
    public function update(Request $request, $id)
    {
        return parent::update($request, $id);
    }

    /**
     * @api {delete} /api/books/:id Удаление книги. 
     * @apiName DeleteBook 
     * @apiGroup Books
     * 
     * @apiSuccess (204) status
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 204 

     * @apiError ResourceNotFound 
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "resource not found"
     *     }
     */
    public function destroy($id)
    {
        return parent::destroy($id);
    }
}
