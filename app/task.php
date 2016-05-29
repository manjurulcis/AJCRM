<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'project_id', 'title', 'description',
    ];
    public $timestamps = true;
    
    public function project(){
        return $this->belongsTo('App\project');
    }
}
