<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes,  HasFactory;


   protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'is_published',
        'published_at',
        'user_id',
    ];

   protected function comments(): HasMany
   {
       return $this->hasMany(Comment::class);
   }

}
