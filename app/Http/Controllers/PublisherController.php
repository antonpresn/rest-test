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
     * выборка книг издательства 
     * редирект на publications.index
     * 
     * @param int $id 
     * @return Resource 
     */
    public function getPublisherBooks($id)
    {
        return redirect()->route('publications.index', ['publisher_id' => $id]);
    }

    /**
     * получение публикации
     * редирект на publications.show
     * 
     * @param type $id 
     * @param type $book_id 
     * @return type
     */
    public function getPublisherBook($id, $book_id)
    {
        return redirect()->route('publications.show', ['id' => $this->ps->uid($id, $book_id)]);
    }

    /**
     * добавление публикации
     * редирект на publications.show
     * 
     * @param Request $request 
     * @param type $id 
     * @param type $book_id 
     * @return type
     */
    public function putPublisherBook(Request $request, $id, $book_id)
    {
        $this->ps->setPublisherBook($id, $book_id);
        return redirect()->route('publications.show', ['id' => $this->ps->uid($id, $book_id)]);
    }

    /**
     * удаление публикации
     * 
     * @param type $id 
     * @param type $book_id 
     * @return type
     */
    public function deletePublisherBook($id, $book_id)
    {
        $this->ps->deletePublisherBook($id, $book_id);
        return response('Deleted', 204);
    }
}
