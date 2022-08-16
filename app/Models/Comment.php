<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =  [
        'post_id',
        'user_id',
        'name',
        'email',
        'website',
        'body',
        'status',
    ];

    /**
     * Get the post for the comment.
     * Many comments belong to one post. (Many to One)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
