<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Контроллер для конечной точки /api/authors
 */
class AuthorController extends CommonApiController
{

    /**
     * Класс сущности 
     * 
     * @var string
     */
    protected $entityClass = 'App\Author';

    /**
     * Класс ресурса
     * 
     * @var string
     */
    protected $resourceClass = 'App\Http\Resources\AuthorResource';

    /**
     * Класс коллекции ресурса
     * 
     * @var string
     */
    protected $collectionResourceClass = 'App\Http\Resources\AuthorsResource';


    /**
     * @api {get} /api/authors/ Зарос авторов 
     * @apiName GetAuthors
     * @apiGroup Authors
     *
     * @apiSuccess {Object} data список авторов 
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "data": [
     *              {
     *                "id": 2,
     *                "book_id": 1,
     *                "firstname": "Jayce",
     *                "lastname": "Turner1",
     *                "secondname": "Walter"
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
     * @api {post} /api/authors/ Создание автора
     * @apiName CreateAuthor 
     * @apiGroup Authors
     * 
     * @apiSuccess {Object} data созданный автор 
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 201 Created 
     *     {
     *          "data": {
     *                "id": 2,
     *                "book_id": 1,
     *                "firstname": "Jayce",
     *                "lastname": "Turner1",
     *                "secondname": "Walter"
     *          }
     *      }
     */
    public function store(Request $request)
    {
        return parent::store($request); 
    }

    /**
     * @api {post} /api/autors/:id Просмотр автора. 
     * @apiName GetAuthor 
     * @apiGroup Authors
     * 
     * @apiSuccess {Object} data автор 
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 200 
     *     {
     *          "data": {
     *                "id": 2,
     *                "book_id": 1,
     *                "firstname": "Jayce",
     *                "lastname": "Turner1",
     *                "secondname": "Walter"
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
     * @api {patch} /api/authors/:id Изменение автора. Частичное
     * @api {put} /api/authors/:id Изменение автора. Полное 
     * @apiName UpdateAuthor 
     * @apiGroup Authors
     * 
     * @apiSuccess {Object} data автор 
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 200 
     *     {
     *          "data": {
     *                "id": 2,
     *                "book_id": 1,
     *                "firstname": "Jayce",
     *                "lastname": "Turner1",
     *                "secondname": "Walter"
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
     * @api {delete} /api/authors/:id Удаление автора. 
     * @apiName DeleteAuthor 
     * @apiGroup Authors
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
    