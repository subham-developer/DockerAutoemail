<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monthly_record extends Model
{

  
    public function clients(){
        return $this->belongsToMany('App\Clients');
    }
}
