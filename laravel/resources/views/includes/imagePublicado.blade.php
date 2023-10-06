{{-- @if($image->user->image)
    <div class="container-avatar" > --}}
        {{-- <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt=""> --}} {{-- se puede hacer tambien asi --}}
    
        {{-- <img src="{{ route('user.avatar', ['filename'=>$image->user->image]) }}" alt="" class="avatar"> --}} {{-- Este es mejor porque no tenemos que cambiar la dirección --}}
   {{--  </div>
@endif --}}


<div class="card pub_image">
                    
    <div class="card-header">
        <a href="{{ route('image.detail', ['id' => $image->id])}}">
            @if($image->user->image)
    <div class="container-avatar" >
        {{-- <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt=""> --}} {{-- se puede hacer tambien asi --}}
    
        <img src="{{ route('user.avatar', ['filename'=>$image->user->image]) }}" alt="" class="avatar"> {{-- Este es mejor porque no tenemos que cambiar la dirección --}}
    </div>
@endif
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
                {{ count($image->likes)}}
            </span>
        </div>
        <a href="" class="btn btn-sm btn-warning btn-comments">
            Comentario ({{count($image->comments)}})
        </a>
    </div>
</div>