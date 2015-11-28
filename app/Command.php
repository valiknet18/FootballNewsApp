<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public $fillable = [
        'title',
        'short_description',
        'description',
        'logo'
    ];

    public $timestamps = false;

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function getLogoAttribute($logo)
    {
        return "http://football.local/uploads/" . $logo;
    }
}