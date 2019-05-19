<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**リレーション定義。メソッド名は参照先のテーブル名をルール通りに付ける */
    public function tweets(){
        //引数には参照先のクラスの名前空間を入れる
        return $this->hasMany('App\Tweet');
    }

    public function userProfile(){
        return $this->hasOne('App\UserProfile');
    }
}
