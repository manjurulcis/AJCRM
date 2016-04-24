<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'project_id','company_id','name','logo','description'
    ];
    public $timestamps = true;
}
