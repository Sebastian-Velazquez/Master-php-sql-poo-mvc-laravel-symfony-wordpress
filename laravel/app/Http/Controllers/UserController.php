<?php
//php artisan make:controller UserController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function config(){
        return view('user.config'); //user es la carpeta y config es el arvhi que esta en la carpeta view
    }
}
