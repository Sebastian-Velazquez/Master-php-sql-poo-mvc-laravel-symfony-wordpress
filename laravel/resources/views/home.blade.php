@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('includes.message')
            @foreach($images as $image)
                <div class="card pub_image">
                    
                    <div class="card-header">
                        <a href="{{ route('image.detail', ['id' => $image->id])}}">
                            @include('includes.imagePublicado')
                            {{ $image->user->name.' '.$image->user->surname}}
                            <span class="nickname">
                                {{' | @'.$image->user->nick }}
                            </span>
                        </a>
                    </div>

                    <div class="card-body"> 
                        <div class="image-container">
                            <img src="{{ route('image.file',['filename'=>$image->image_path])}}" alt="">
                        </div>
                        
                        <div class="description">
                            <span calss="nickname">{{ '@'.$image->user->nick}}</span>
                            <span calss="nickname date">{{' | '.\FormatTime::longTimeFilter( $image->created_at)}}</span>
                            <p>{{ $image->description}}</p> 
                        </div>
                        <div class="likes">
                            
                            {{-- Comprobar si el usuario le dio like a la imagen --}}
                            <?php $user_like = false; ?>
                            @foreach ($image->likes as $like)
                                @if ($like->user->id == Auth::user()->id )
                                    <?php $user_like = true; ?>
                                @endif
                            @endforeach


                            @include('includes.heartIcono')

                            {{-- @if ($user_like)
                                <i class="fa-solid fa-heart btn-like" style="color: #a80000;"></i> 
                            @else
                                <i class="fa-regular fa-heart btn-dislike" style="color: #4e4f50;"  ></i>
                            @endif
                            <span class="number_likes"> --}}
                                {{ count($image->likes)}}
                            </span>
                        </div>
                        <a href="" class="btn btn-sm btn-warning btn-comments">
                            Comentario ({{count($image->comments)}})
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Paginacion --}}
        <div class="clearfix">
            
            {{$images->links()}}
        </div>
    </div>
</div>
@endsection
