<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс описывающий модель сущности 'издательство'
 */
class Publisher extends Model
{
	protected $table = 'publishers';

	public $timestamps = false;

	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string название издательства 
	 */
	public $name;

	/**
	 * Получает все книги издательства 
	 */
	public function books()
	{
		return $this->belongsToMany('App\Books', 'books_publishers');
	}
}
