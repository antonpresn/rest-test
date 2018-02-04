<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublicationServiceInit;
use App\Http\Resources\PublicationResource;
use App\Http\Resources\PublicationsResource;
use Illuminate\Support\Facades\DB;
use App\Publisher;
use App\Publication;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublicationController extends Controller
{
    use PublicationServiceInit;

    /**
     * Инициализация 
     * 
     */
    public function __construct()
    {
        $this->initPublicationService();
    }

    /**
     * @api {get} /api/publications/ Зарос публикаций 
     * @apiName GetPublications
     * @apiGroup Publications
     *
     * @apiSuccess {Object} data список публикаций 
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "data": [
     *              {
     *                "publisher_id": 2,
     *                "book_id": 1 
     *              }
     *          ]
     *      }
     *
     */
    public function index()
    {
        $publisherFilter = request()->get('publisher_id');
        $bookFilter = request()->get('book_id');
        $query = Publication::query();

        if ($publisherFilter) {
            $query->where('publisher_id', $publisherFilter);
        }
        if ($bookFilter) {
            $query->where('book_id', $bookFilter);
        }

        $all = $query->get();
        // print_r($all);
        return new PublicationsResource($all);
    }

    /**
     * @api {get} /api/publications/:uid показать публикацию если таковая имеется. Где :uid суррогатный составной ключ
     * @apiName GetPublication
     * @apiGroup Publications
     *
     * @apiSuccess {Object} data публикация 
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *          "data": 
     *              {
     *                "publisher_id": 2,
     *                "book_id": 1 
     *              }
     *      }
     * @apiError ResourceNotFound 
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "resource not found"
     *     }*
     */
    public function show($id)
    {
        $ids = $this->ps->resolve($id);
        $publication = $this->ps->getPublication($ids['publisher_id'], $ids['book_id']);
        if (isset($publication)) {
            return new PublicationResource($publication);
        } else {

            throw new ModelNotFoundException();
        }
    }
}
