<?php
// php artisan make:model Image.. Que son las tablas de SQL

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    //Relación One To Many
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    //Relación One To Many
    public function likes(){
        return $this->hasMany('App\Like');
    }
    //Relación Muchos a Uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id'); //user_id es el campo con el cual se va a relacionar
    }
    use HasFactory;
}
