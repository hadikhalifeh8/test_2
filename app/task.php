<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table = 'tasks';
    protected $fillable=['name', 'user_id', 'departmet_id'];



    
public function usr_rltn()
{
    return $this->belongsTo('App\User', 'user_id');
}



public function dep_rltn()
{
    return $this->belongsTo('App\Department', 'departmet_id');
}
}

