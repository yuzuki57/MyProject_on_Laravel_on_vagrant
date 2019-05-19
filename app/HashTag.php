<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashTag extends Model
{
    protected $fillable = ['name'];
    public function tweets(){
        return $this->belongsToMany('App\Tweet');
    }
}