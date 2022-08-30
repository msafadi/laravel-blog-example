<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'user_id',
        'content',
        'image_path',
        'status',
        'featured',
        'published_at',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return asset('images/blank.png');
    }

    /**
     * Get the comments for the post.
     * One post has many comments. (One to Many)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    /**
     * Get the category for the post.
     * Many posts belong to one category. (Many to One)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')
            ->withDefault([
                'name' => 'Anonymous'
            ]);
    }

    public function getUrlAttribute()
    {
        return route('posts.show', $this->slug);
    }

    public function getExcerptAttribute()
    {
        return Str::words(strip_tags($this->content), 40);
    }
}
