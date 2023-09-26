<?php
//comando para crear un nuevo controlador: php artisan make:controller HomeController
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //$images = Image::orderBy('id', 'desc')->get(); //usamos ORM // sin el get() no se ejecuta la consulta
        //puedo unsar Image::All() pero no se orderia. Y no es necesario usar el get()
        $images = Image::orderBy('id', 'desc')->simplePaginate(2);//para hacer ppaginación

        return view('home', [ 
            'images' => $images
        ]);
    }
}
