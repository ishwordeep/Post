@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($posts))
    <div class="card-header">
        <h4>{{$user->name}}</h4>
        <p>{{$posts->count()}} {{Str::plural('Post',$posts->count())}}</p>
    </div>
    @foreach($posts as $post)
    <div class="card m-2" style="width: 50rem;">
        
        <div class="card-body">
            <a href="{{route('users.post',$post->user)}}"><span class="card-title h5">{{$post->user->name}}</span></a><small class="mx-1">{{$post->created_at->diffForHumans()}}</small>
            <p class="card-text">{{$post->body}}</p>
        </div>
        <div class="p-2">{{$post->likes->count()}} {{Str::plural('Like',$post->likes->count())}}</div>
        @auth
        <div class="d-flex flex-row mx-2">
            @if(!$post->likedBy(auth()->user()))
            <form action="{{route('likes.store',$post)}}" method="post">
                @csrf
                <div class="p-2"><button type="submit" class="border-0">Like</button></div>
            </form>
            @else
            <form action="{{route('unlikes',$post)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="p-2"><button type="submit" class="border-0">Unlike</button></div>
            </form>
            @endif
            @if($post->user_id===auth()->user()->id)
            <form action="{{route('posts.delete',$post)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="p-2"><button type="submit" class=" text-danger border-0">Delete</button></div>
            </form>
            @endif



        </div>
        @endauth
    </div>

    @endforeach
    {{$posts->links()}}
    @else
    Posts not availabe
    @endif


</div>
@endsection