<div class="likes">
    @if ($user_like)
        <i class="fa-solid fa-heart btn-like" data-id="{{ $image->id }}" style="color: #a80000;"></i> 
        <i class="fa-regular fa-heart  btn-dislike" data-id="{{ $image->id }}" style="color: #4e4f50; display:none"  ></i>
    @else
        <i class="fa-regular fa-heart btn-dislike" data-id="{{ $image->id }}" style="color: #4e4f50;"  ></i>
        <i class="fa-solid fa-heart  btn-like" data-id="{{ $image->id }}"  style="color: #a80000; display: none"></i>
    @endif
</div>

