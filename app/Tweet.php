<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /**リレーション定義。メソッド名は参照先のテーブル名をルール通りに付ける */
    public function user(){
        //引数には参照先のクラスの名前空間を入れる
        return $this->belongsTo('App\User');
    }

    public function hashTags(){
        return $this->belongsToMany('App\HashTag');
    }
}
