<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * публикации
 */
class Publication extends Model
{
    //
    protected $table = 'books_publishers';

    /**
     * поля доступные для создания и изменения
     * 
     * @var array
     */
    protected $fillable = ['publisher_id', 'book_id'];

    public $timestamps = false;
    public $incrementing = false;


    /**
     * @var int идентификатор издателя
     */
    public $publisher_id;

    /**
     * @var int идентификатор книги
     */
    public $book_id;
}
