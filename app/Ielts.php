<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ielts extends Model
{
    protected $table = "ielts";


    public function comments(){
    	return $this->hasMany('App\IeltsComments');
    }
}
