<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public $fillabe = [
        'title',
        'slug',
        'short_description',
        'description',
        'logo'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}