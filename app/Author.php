<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс описывающий модель сущности 'автор'
 */
class Author extends Model
{
	protected $table = 'authors';

	public $timestamps = false;

	/**
	 * @var int идентфикатор автора
	 */
	public $id;

	/**
	 * @var int идентфикатор книги 
	 */
	public $book_id;

	/**
	 * @var string имя
	 */
	public $firstname;

	/**
	 * @var string фамилия 
	 */
	public $lastname;

	/**
	 * @var string отчество
	 */
	public $secondname;

	/**
	 * получает книгу автора 
	 */
	public function book() 
	{
		return $this->belongsTo('App\Book');
	}
}
