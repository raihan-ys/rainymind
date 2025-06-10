<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $fillable = [
		'name',
		'description',
		'created_by',
		'updated_by'
	];

	// Defining 'deleted_at' column for soft deletes.
	protected $dates = ['deleted_at'];

	/**
	 * Get the posts for the category.
	 */
	public function posts()
	{
		return $this->hasMany(Post::class, 'category_id');
	}

	/**
	 * Get the user that owns the category.
	 */
	public function createdBy()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	/**
	 * Get the user that updated the category.
	 */
	public function updatedBy()
	{
		return $this->belongsTo(User::class, 'updated_by');
	}
}
