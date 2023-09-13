<?php
// php artisan make:model Image

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

    use HasFactory;
}
