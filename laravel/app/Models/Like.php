<?php
// php artisan make:model Like.. Que son las tablas de SQL
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    //Relación Muchos a Uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id'); //user_id es el campo con el cual se va a relacionar
    }
    //Relación Muchos a Uno
    public function image(){
        return $this->belongsTo('App\Image', 'image_id'); //user_id es el campo con el cual se va a relacionar
    }
    //use HasFactory;
}
