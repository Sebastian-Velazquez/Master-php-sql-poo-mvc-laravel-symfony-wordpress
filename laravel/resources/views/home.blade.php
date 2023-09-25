@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('includes.message')
            @foreach($images as $image)
            <div class="card pub_image">
                
                <div class="card-header">
                    @include('includes.imagePublicado')
                    {{ $image->user->name.' '.$image->user->surname}}
                    <span class="nickname">
                        {{' | @'.$image->user->nick }}
                    </span>
                </div>

                <div class="card-body"> 
                    <div class="image-container">
                        <img src="{{ route('image.file',['filename'=>$image->image_path])}}" alt="">
                    </div>
                    <div class="like">

                    </div>
                    <div class="description">
                        <span calss="nickname">{{ '@'.$image->user->nick}}</span>
                        
                        <p>{{ $image->description}}</p> 
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
