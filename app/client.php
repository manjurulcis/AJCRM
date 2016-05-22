<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'client_id', 'client_name', 'client_address', 'client_email', 'contact_no', 'client_photo'
    ];
    public $timestamps = true;
    
    public function project(){
        return $this->hasMany('App\project','client_id');
    }
}
