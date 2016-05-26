<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class team_member extends Model
{
    protected $fillable = [
        'user_id', 'team_id'
    ];
    public $timestamps = true;
}
