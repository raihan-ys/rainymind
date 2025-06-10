<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
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
    * Get the category that owns the post.
    */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    /**
    * Get the user that owns the post.
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
