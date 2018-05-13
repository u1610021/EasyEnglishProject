<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IeltsComments extends Model
{
    protected $table = 'ielts_comments';

    public function ielts(){
    	return $this->belongsTo('App\Ielts');
    }
}
