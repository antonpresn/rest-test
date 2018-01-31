<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс описывающий модель сущности 'книга'
 */
class Book extends Model
{
	protected $table = 'books';

	public $timestamps = false;

	/**
	 * @var int идентификатор книги
	 */
	public $id;

	/**
	 * @var string название книги
	 */
	public $name;

	/**
	 * Выбирает всех авторов книги
	 */
	public function authors() 
	{
		return $this->hasMany('App\Author');
	}

	/**
	 * Получает все издательства книги
	 */
	public function publishers()
	{
		return $this->belongsToMany('App\Publisher', 'books_publishers');
	}
}
