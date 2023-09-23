@if($image->user->image)
    <div class="container-avatar" >
        {{-- <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt=""> --}} {{-- se puede hacer tambien asi --}}
    
        <img src="{{ route('user.avatar', ['filename'=>$image->user->image]) }}" alt="" class="avatar"> {{-- Este es mejor porque no tenemos que cambiar la dirección --}}
    </div>
@endif