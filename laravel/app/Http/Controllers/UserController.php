<?php
//php artisan make:controller UserController
namespace App\Http\Controllers;

//use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

//para de los input
use Illuminate\Http\Request;

//Modelo
use App\Models\User;

//Storage parasubir la imagenes. Es muy distindo a node js
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UserController extends Controller
{ //user es la carpeta y config es el arvhi que esta en la carpeta view
    public function config()
    {
        try {
            $view = view('user.config');
            return $view;
        } catch (\Exception $e) {
            // Manejar la excepción y mostrar un mensaje genérico al usuario
            return  " Ocurrió un error. Por favor, inténtelo de nuevo más tarde.";
        }
    }


    public function update(Request $request)
    {

        //conseguir usuario identificado
        $user = Auth::user();

        $id = $user->id;

        //validacion
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
        ]);

        // Subir imagen 
        $image_path = $request->file('image_path');
        /* var_dump($image_path);
        die(); */

        if ($image_path) {
            //poner nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName(); //getClientOriginalName para guardar el nombre original
            //guardar en la carpeta users que esta dentro de la carpeta storage
            Storage::disk('users')->put($image_path_name, file_get_contents($image_path));

            //seteo el nombre de la imagen en el objeto. asignar nuevo valores al objeto usuario
            $user->image = $image_path_name;
        }
        // Acceder a los datos validados de forma más concisa
        $userData = $request->only(['name', 'surname', 'nick', 'email']);

        //asignar nuevo valores al objeto usuario
        $user->name = $userData['name'];
        $user->surname = $userData['surname'];
        $user->nick = $userData['nick'];
        $user->email = $userData['email'];

        //ejecutar consulta y cambios en la bd
        $user->update();

        return redirect()->route('config')
            ->with(['message' => 'Usuario actualizado corectamente']);
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
    public function profile($id){
        $user = User::find($id);

        return view('user.profile', [
            'user' => $user
        ]);
    }
}
