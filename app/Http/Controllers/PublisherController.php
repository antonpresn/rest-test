<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublicationServiceInit;

/**
 * Контроллер издателсьтво
 * 
 */
class PublisherController extends CommonApiController
{

    use PublicationServiceInit;

    /**
     * Класс сущности 
     * 
     * @var string
     */
    protected $entityClass = 'App\Publisher';

    /**
     * Класс ресурса
     * 
     * @var string
     */
    protected $resourceClass = 'App\Http\Resources\PublisherResource';

    /**
     * Класс коллекции ресурса
     * 
     * @var string
     */
    protected $collectionResourceClass = 'App\Http\Resources\PublishersResource';

    /**
     * Инициализация 
     * 
     */
    public function __construct()
    {
        $this->initPublicationService();
    }

    /**
     * @api {get} /api/publishers/ Зарос издательств 
     * @apiName GetPublishers
     * @apiGroup Publishers
     *
     * @apiSuccess {Object} список издательств 
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
     * @api {post} /api/publishers/ Создание издательства
     * @apiName CreatePublisher 
     * @apiGroup Publishers
     * 
     * @apiSuccess {Object} созданная издательство 
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
     * @api {post} /api/autors/:id Просмотр издательства. 
     * @apiName GetPublisher 
     * @apiGroup Publishers
     * 
     * @apiSuccess {Object} издательство 
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
     * @api {patch} /api/publishers/:id Изменение издательства. Частичное
     * @api {put} /api/publishers/:id Изменение издательства. Полное 
     * @apiName UpdatePublisher 
     * @apiGroup Publishers
     * 
     * @apiSuccess {Object} издательство 
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
     * @api {delete} /api/publishers/:id Удаление издательства. 
     * @apiName DeletePublisher 
     * @apiGroup Publishers
     * 
     * @apiSuccess 204 
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

    /**
     * @api {get} /api/publishers/:id/books Выборка книг издательства 
     *                  производится переадрессация на /api/publications?publisher_id=:id
     * @apiName GetPublisherBooks
     * @apiGroup Publishers
     * 
     * @apiSuccess 302 Location /api/publications?publisher_id=:id
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 302 Found
     */
    public function getPublisherBooks($id)
    {
        return redirect()->route('publications.index', ['publisher_id' => $id]);
    }

    /**
     * @api {get} /api/publishers/:publisher_id/books/:book_id получение публикации. редирект на /api/publications/:uid, где uid суррогатный ключ ассоциации
     * @apiName GetPublisherBook
     * @apiGroup Publishers
     * 
     * @apiSuccess 302 Location /api/publications/:uid
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 302 Found
     */
    public function getPublisherBook($publisher_id, $book_id)
    {
        return redirect()->route('publications.show', ['id' => $this->ps->uid($publisher_id, $book_id)]);
    }

    /**
     * @api {put} /api/publishers/:publisher_id/books/:book_id добавление публикации. редирект на /api/publications/:uid, где uid суррогатный ключ ассоциации
     * @apiName PutPublisherBook
     * @apiGroup Publishers
     * 
     * @apiSuccess 302 Location /api/publications/:uid
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 302 Found
     */
    public function putPublisherBook(Request $request, $publisher_id, $id)
    {
        $this->ps->setPublisherBook($id, $publisher_id);
        return redirect()->route('publications.show', ['id' => $this->ps->uid($publisher_id, $id)]);
    }

    /**
     * @api {delete} /api/publishers/:publisher_id/books/:book_id удаление публикации. 
     * @apiName DeletePublisherBook
     * @apiGroup Publishers
     * 
     * @apiSuccess 204 
     * 
     * @apiSuccessExample Success-Response: 
     *     HTTP/1.1 204 
     */
    public function deletePublisherBook($publisher_id, $id)
    {
        $this->ps->deletePublisherBook($publisher_id, $id);
        return response('Deleted', 204);
    }
}
