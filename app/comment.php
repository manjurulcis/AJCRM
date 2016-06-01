<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'task_id','user_id','comment','file'
    ];
    public $timestamps = true;
    
    public function project(){
        return $this->belongsTo('App\project');
    }
}
