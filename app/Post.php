<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['title', 'body','author_id', 'image', 'excerpt'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
