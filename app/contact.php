<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    public function contact(){
        return $this->belongsTo('App\contact');
    }
}