<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $fillable = [
		'title',
		'content',
		'category_id',
		'created_by',
		'updated_by',
	];

	// Defining 'deleted_at' column for soft deletes.
	protected $dates = ['deleted_at'];

	/**
    * Get the post that owns the comment.
    */
	public function post()
	{
		return $this->belongsTo(Post::class, 'post_id');
	}

	/**
		* Get the user that owns the comment.
		*/
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
