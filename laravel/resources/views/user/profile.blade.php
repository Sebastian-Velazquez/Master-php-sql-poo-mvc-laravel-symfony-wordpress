@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-user">
                @if($user->image)
                    <div class="container-avatar" >
                        {{-- <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt=""> --}} {{-- se puede hacer tambien asi --}}
                        <img src="{{ route('user.avatar', ['filename'=>$user->image]) }}" alt="" class="avatar"> {{-- Este es mejor porque no tenemos que cambiar la dirección --}}
                    </div>
                @endif

                <div class="user-info">
                    <h1>{{'@'.$user->nick}}</h1>
                    <h2>{{$user->name .' '. $user->surname}}</h2>
                    <p>{{'Se unió: '.\FormatTime::longTimeFilter( $user->created_at)}}</p>
                </div>
                
                <div class="clearfix"></div>{{--  Es para que lo de abajo no se adapte al css de arriba --}}
                <hr>
            </div>

            <div class="clearfix"></div>{{--  Es para que lo de abajo no se adapte al css de arriba --}}

            @foreach($user->images as $image)
                @include('includes.imagePublicado', ['image'=>$image])
            @endforeach
        </div>

    </div>
</div>
@endsection
