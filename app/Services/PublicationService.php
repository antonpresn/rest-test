<?php

namespace App\Services;

use App\Publisher;
use App\Publication;
use App\Book;

/**
 * Сервис по работе с публикациями 
 * публикация - связь издательства и книги
 * 
 */
class PublicationService 
{
    public function __construct() 
    {
        //
    }

    /**
     * получает уникальный идентификатор публикации 
     * 
     * @var string
     */
    public function uid($publisher_id, $book_id)
    {
        return $publisher_id . '_' . $book_id;
    }

    /**
     * получает идентификаторы издателя и книги из идентификатора публикации 
     * 
     * @var array ['publisher_id' => $publisher_id, 'book_id' => $book_id]
     */
    public function resolve($uid)
    {
        return array_combine(['publisher_id', 'book_id'], explode('_', $uid));
    }

    /**
     * сохранение связи издателя с книгой 
     * 
     * @param type $id 
     * @param type $book_id 
     * @return type
     */
    public function setPublisherBook($id, $book_id)
    {
        $publication = $this->getPublication($id, $book_id);
                        // print_r($publication);exit;
        if (!$publication 
            && ($publisher = Publisher::find($id)) 
            && ($book = Book::find($book_id))
        )
        {
            $params = ['publisher_id'=>$id, 'book_id'=>$book_id];
            Publication::create($params);
        } else {

        }

    }

    /**
     * удаление связи издателя с книгой 
     * 
     * @param type $id 
     * @param type $book_id 
     * @return type
     */
    public function deletePublisherBook($id, $book_id)
    {
        $bookCondition = function($q) use ($book_id) {
            $q->where('book_id', $book_id);
        };

        $publisher = Publisher::find($id)
        // ->whereHas('books', $bookCondition)
        ->whereHas('books', $bookCondition)
        ->get()
        ->first();

        if ($publisher)
        {
            $publisher->books()->detach();
        } else {

        }
        
    }

    /**
     * выбрать публикацию 
     * 
     * @param type $id 
     * @param type $book_id 
     * @return type
     */
    public function getPublication($id, $book_id) 
    {

        $publication = Publication::where('publisher_id','=',$id)
                        ->where('book_id', '=', $book_id)
                        ->get()->first();

        return $publication;
    }
}