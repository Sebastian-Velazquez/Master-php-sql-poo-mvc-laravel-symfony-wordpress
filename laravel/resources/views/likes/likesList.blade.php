@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Mis Imagenes favoritas</h1>
            <hr>
            @foreach ($likesList as $like)
                {{-- {{$like->user_id}} --}}
                @include('includes.imagePublicado', ['image'=>$like->image])
            @endforeach
        </div>
        {{-- Paginacion --}}
        <div class="clearfix">
            {{$likesList->links()}}
        </div>
    </div>
</div>
@endsection
