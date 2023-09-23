<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //Relación Muchos a Uno
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); //user_id es el campo con el cual se va a relacionar
    }
    //Relación Muchos a Uno
    public function image(){
        return $this->belongsTo('App\Models\Image', 'image_id'); //user_id es el campo con el cual se va a relacionar
    }
    //use HasFactory;
}
