<?php
// php artisan make:controller ImgeController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //Middlewares
    public function __construct()
    {
        $this->middleware('auth');
    }
    //mostrar Vista
    public function create(){
        return view('image.create');//carpeta y archivo
    }
    //guarda imagen
    public function save(Request $request){
        var_dump($request);
        die();
    }

}
