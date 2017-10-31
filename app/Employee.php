<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function department(){
        return $this->belongsTo('App\Department')->select(['id', 'name']);
    }

    public function position(){
        return $this->belongsTo('App\Position')->select(['id', 'name']);
    }

    public function emails(){
        return $this->hasMany('App\Email')->select(['employee_id', 'email', 'personal']);
    }

    public function phones(){
        return $this->hasMany('App\Phone')->select(['employee_id', 'number', 'personal']);
    }
}
