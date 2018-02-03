<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс описывающий модель сущности 'издательство'
 */
class Publisher extends Model
{
	protected $table = 'publishers';

	/**
	 * поля доступные для создания и изменения
	 * 
	 * @var array
	 */
	protected $fillable = ['name'];

	public $timestamps = false;

	/**
	 * @var string название издательства 
	 */
	public $name;

	/**
	 * Получает все книги издательства 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function books()
	{
		return $this->belongsToMany('App\Book', 'books_publishers');
	}
}
