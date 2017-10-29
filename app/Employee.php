<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function position(){
        return $this->belongsTo('App\Position');
    }

    public function emails(){
        return $this->hasMany('App\Email');
    }

    public function phones(){
        return $this->hasMany('App\Phones');
    }
}
