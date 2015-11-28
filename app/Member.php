<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $fillable = [
        'full_name',
        'photo',
        'role',
        'birthday',
        'short_description',
        'description',
        'command_id'
    ];

    public $timestamps = false;

    public function command()
    {
        return $this->belongsTo(Command::class);
    }

    public function getPhotoAttribute($photo)
    {
        return "http://football.local/uploads/" . $photo;
    }
}