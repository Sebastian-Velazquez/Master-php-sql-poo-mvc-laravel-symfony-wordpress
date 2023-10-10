@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Gente</h1> <hr>
            <form action="{{ route('user.index')}}" method="get" id="buscador">
                <div class="row">
                    <div class="form-group col">
                        <input type="search"  id="search" class="form-control">
                    </div>
                    <div class="form-group col btn-searh">
                    <input type="submit" value="Buscar" class="btn btn-success">
                </div>
            </div>
            </form>
            @foreach ($users as $user)
                <div class="profile-user">
                    @if($user->image)
                        <div class="container-avatar" >
                            {{-- <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt=""> --}} {{-- se puede hacer tambien asi --}}
                            <img src="{{ route('user.avatar', ['filename'=>$user->image]) }}" alt="" class="avatar"> {{-- Este es mejor porque no tenemos que cambiar la dirección --}}
                        </div>
                    @endif

                    <div class="user-info">
                        <h2>{{'@'.$user->nick}}</h2>
                        <h3>{{$user->name .' '. $user->surname}}</h3>
                        <p>{{'Se unió: '.\FormatTime::longTimeFilter( $user->created_at)}}</p>
                        <a href="{{ route('profile', ['id' => $user->id])}}" class="btn btn-success">Ver perfil</a>
                    </div>
                    
                    <div class="clearfix"></div>{{--  Es para que lo de abajo no se adapte al css de arriba --}}
                    <hr>
                </div>
            @endforeach
        {{-- Paginacion --}}
        <div class="clearfix">
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection
