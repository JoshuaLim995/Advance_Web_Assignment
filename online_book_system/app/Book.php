<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [
	'id',
	'isbn',
	'title',
	'synopsis',
	'author',
	'edition',
	'edition_year',
	];

	protected $appends = [
	'category',
	];

    public function getCategoryAttribute()
    {
        return $this->categories()->pluck('name');
    }

	public function categories() {
		return $this->belongsToMany(Category::class);
	}
}
