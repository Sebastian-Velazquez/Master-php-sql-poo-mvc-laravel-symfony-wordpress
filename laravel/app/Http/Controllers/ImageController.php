<?php
// php artisan make:controller ImgeController

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

//NEcesito parrar borrar la imagen todos las datos relacionadas a esa imagen en otras tabals
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Arr;

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
        //validación. buscar mas
        $validate = $this->validate($request,[
            'description' => ['required', 'string', 'max:25'],
            'image_path' => ['required','image']
        ]);

        //Recoger los datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        //Asignar valores nuevo objeto
        $user = Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->image_path = null;
        $image->description = $description;

        //Subir fichero
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, file_get_contents($image_path));
            $image->image_path = $image_path_name;
        }
        
        //Guardar en DB
        $image->save();

        return redirect()->route('home')
            ->with(['message' => 'La foto fue guardado correctamente']);
    }
    //sacar Image
    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    //Ruta para detalle de Imagen o publicaión
    public function detail($id){
        $image = Image::find($id);
        return view('image.detail',[
            'image' => $image
        ]);
    }

    //eleiminar imagen
    public function delete($id){
        $user = \Auth::user();
        $image = Image::find($id);
        //buscar comentario para borrar antes que la imagen
        $comments = Comment::where('image_id', $id)->get();
        //buscar likes para borrar antes que la imagen
        $likes = Like::where('image_id', $id)->get();

        if ($user && $image && $image->user->id == $user->id) {
            //elimino comentarios
            if ($comments && count($comments) >=1) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }
            //elimino los likes
            if ($likes && count($likes) >=1) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }
            //elimino fichero de la imagen
            Storage::disk('images')->delete($image->image_path); //image_path es como se llama el campo de la msql
            //elimino el regstro de la imagen
            $image->delete();
            return redirect()->route('home')
                    ->with(['message' => 'La imagen se a borrado correctamente']);
        }else{
        return redirect()->route('home')
        ->with(['message' => 'La imagen no se a borrado correctamente']);
        }
        return redirect()->route('home');
    }
}
