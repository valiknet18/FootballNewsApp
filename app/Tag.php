<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = [
        'title',
    ];

    public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }

    public function scopeFindByName($query, $name)
    {
        return $query->where('title', $name);
    }
}