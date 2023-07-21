<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'keywords',
        'cover_image',
        'view_count',
        'total_duration',
        'category_id',
        'user_id',
        'is_visible',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        
        return $this->belongsTo(User::class);

    }
}
