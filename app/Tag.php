<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = [
        'title',
        'slug'
    ];

    public function articles()
    {
        return $this->hasManyThrough(Article::class, 'article_tag');
    }

    public function scopeFindByName($query, $name)
    {
        return $query->where('title', $name)->first();
    }
}