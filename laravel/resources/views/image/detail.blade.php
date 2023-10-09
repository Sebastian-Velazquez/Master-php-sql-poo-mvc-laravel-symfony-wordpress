@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card pub_image pub_image_detail">
                
                <div class="card-header" style="color: #4e4f50">
                    @if($image->user->image)
                        <div class="container-avatar" > 
                            <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt=""> {{-- se puede hacer tambien asi --}}
                        
                            <img src="{{ route('user.avatar', ['filename'=>$image->user->image]) }}" alt="" class="avatar"> {{-- Este es mejor porque no tenemos que cambiar la dirección --}}
                        </div>
                    @endif 
                    {{ $image->user->name.' '.$image->user->surname}}
                    <span class="nickname">
                        {{' | @'.$image->user->nick }}
                    </span>
                </div>

                <div class="card-body"> 
                    <div class="image-container image-detail">
                        <img src="{{ route('image.file',['filename'=>$image->image_path])}}" alt="">
                    </div>
                    
                    <div class="description">
                        <span calss="nickname">{{ '@'.$image->user->nick}}</span>
                        <span calss="nickname date">{{' | '.\FormatTime::longTimeFilter( $image->created_at)}}</span>
                        <p>{{ $image->description}}</p> 
                    </div>
                    <div class="clearfix"></div>
                    <div class="likes">
                            
                        {{-- Comprobar si el usuario le dio like a la imagen --}}
                        <?php $user_like = false; ?>
                        @foreach ($image->likes as $like)
                            @if ($like->user->id == Auth::user()->id )
                                <?php $user_like = true; ?>
                            @endif
                        @endforeach

                        @include('includes.heartIcono')
                            {{ count($image->likes)}}
                        </span>
                    </div>
                    
                    @if (Auth::user() && Auth::user()->id == $image->user->id)
                        <div class="action">
                            <a href="" class="btn btn-sm btn-primary">Actualizar</a>
                            <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-sm btn-danger">Borrar</a>
                        </div>
                    @endif
                        <h2>Comentario ({{count($image->comments)}})</h2>
                        <hr>
                        <form action="{{ route('comment.save') }}" method="post">
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}"> {{-- hiden es para crear un campo oculto --}}
                            
                            @error('image_id')
                                <span class="alert-danger"  role="alert">
                                    <strong >{{ $message }}</strong>
                                </span>
                            @enderror

                            <p>
                                <textarea name="content" id="" cols="5" rows="3" class="form-control {{$errors->has('content') ? 'is-invalid' : '' }}" ></textarea>
                            </p>

                            @error('content')
                                <span class="alert alert-succes" style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <br>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </form>
                        <hr>
                        @foreach ($image->comments as $comment)
                            <div class="comment">
                                <div class="description">
                                    <span calss="nickname">{{ '@'.$comment->user->nick}}</span>
                                    <span calss="nickname date">{{' | '.\FormatTime::longTimeFilter( $comment->created_at)}}</span>
                                    <p>{{ $comment->content}} <br>
                                    @if (Auth::check() && ($comment->user_id = Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                        <a href="{{ route('comment.delete', ['id' => $comment->id ]) }}" class="btn btn-sm btn-danger">
                                            Eliminar
                                        </a> 
                                    @endif
                                </p>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
