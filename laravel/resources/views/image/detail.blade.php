@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @include('includes.message')
            <div class="card pub_image pub_image_detail">
                
                <div class="card-header" style="color: #4e4f50">
                    @include('includes.imagePublicado')
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
                        <p>{{ $image->description}}</p> 
                    </div>
                    <div class="clearfix"></div>
                    <div class="likes">
                        <i class="fa-solid fa-heart" style="color: #a80000;"></i> 
                        <i class="fa-regular fa-heart" style="color: #4e4f50;display: none;"  ></i>
                    </div>
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
                                <textarea name="content" id="" cols="5" rows="3" class="form-control" ></textarea>
                            </p>

                            @error('content')
                                <span class="alert alert-succes" style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button type="submit" class="btn btn-success">Enviar</button>
                        </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
