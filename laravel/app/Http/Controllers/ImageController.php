<?php
// php artisan make:controller ImgeController

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

}
