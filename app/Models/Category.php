<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Import into namespace

class Category extends Model
{
    use HasFactory; // Trait

    // Accessors
    // $category->image_url
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return asset('images/blank.png');
    }
}
