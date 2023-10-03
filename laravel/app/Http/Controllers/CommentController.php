<?php
// php artisan make:controller CommentController

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; //modelo 

class CommentController extends Controller
{
    //Middlewares
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request)
    {

        //validate
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        //recoger datosde formulario
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        //Asignar los valores objeto Comment
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //Guardar
        $comment->save();

        //redireccion
        return redirect()->route('image.detail', ['id' => $image_id])
            ->with(([
                'message' => 'Has publicado tu comentario coorrectamente!!'
            ]));
    }
    public function delete($id)
    {
        //datos del usuario identificado 
        $user = \Auth::user();

        //Consegui objeto del comentario
        $comment = Comment::find($id);

        //Comprobar si soy el dueño del comentario o del publicacion
        if ($user && ($comment->user_id = $user->id || $comment->image->user_id == $user->id)) {
            $comment->delete();

            //redireccion
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with(([
                    'message' => 'Comentario eliminado correctamente!!'
                ]));
        } else {
            //redireccion
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with(([
                    'message' => 'El comentario no se a eliminado!'
                ]));
        }
    }
}
