<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'client_id', 'project_title', 'project_desc', 'project_status', 'end_time','logo'
    ];
    public $timestamps = true;
    
    public function client(){
        return $this->belongsTo('App\client','client_id');
    }
    
}
