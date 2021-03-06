<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addCompany extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name', 'email', 'logo','description','address','contact_no'
    ];
    public $timestamps = true;
    
    public function team(){
        return $this->hasMany('App\Team','company_id');
    }

}
