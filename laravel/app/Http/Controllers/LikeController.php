<?php
//php artisan make:controller LikeController
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function like($image_id){
        //recoger datos de usuario y imagen
        $user = \Auth::user();
        
        //condicion si el like ya existe y no duplicarlo
        $isset_like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)//es otra consulta
                            ->count();
        if ($isset_like == 0) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;
            
            //guardar
            $like->save();
    
            return response()->json([
                'like' => $like
            ]);
        }else{
            return response()->json([
                'message' => 'El like ya existe'
            ]);
        }

    }
    public function dislike($image_id){
        //recoger datos de usuario y imagen
        $user = \Auth::user();
        
        //condicion si el like ya existe y no duplicarlo
        $like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)//es otra consulta
                            ->first();//recoge un solo dato
        if ($like) {
            //guardar
            $like->delete();
    
            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike correctamente'
            ]);
        }else{
            return response()->json([
                'message' => 'El like no existe'
            ]);
        }
    }
}
