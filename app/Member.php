<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $fillable = [
        'full_name',
        'photo',
        'role',
        'slug',
        'birthday',
        'short_description',
        'description',
        'command_id'
    ];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }
}