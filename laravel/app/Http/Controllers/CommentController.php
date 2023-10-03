<?php
// php artisan make:controller CommentController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
     //Middlewares
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

        //validate
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        $image_id = $request->input('image_id');
        $content = $request->input('content');

        var_dump($content);
        die();
    }
}
