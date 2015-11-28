<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = [
        'title',
        'short_description',
        'description'
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }
}
