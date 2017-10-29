<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $casts = ['personal' => 'boolean'];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
