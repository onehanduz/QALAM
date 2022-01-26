@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="row p-3 mt-1">
        <div class="card col-5">
            @if($post->image)
            <img src="../{{ $post->image }}" class="w-100">
            @endif
            <div class="card-body">
                <p class="card-text">{{ $post->text }}</p>
                <div class="d-flex">
                    <div class="mt-2"><p>{{ $post->likes->count() }}</p></div>
                    
                    <form action="{{ route('like', ['id'=>$post->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="ps-2">
                            <button type="submit" class="btn btn-outline-primary">Like</button>
                        </div>
                    </form>
                    
                    <form action="{{ route('dislike', ['id'=>$post->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="ps-2">
                            <button type="submit" class="btn btn-outline-danger">Dislike</button>
                        </div>
                    </form>
                    <div class="mt-2 ps-2"><p>{{ $post->dislikes->count() }}</p></div>
                </div>
                <div class="d-flex">
                    <div><a href="{{ route('show', ['id'=>$post->user->id]) }}">{{ $post->user->username }}</a></div>
                    <div class="ps-2"><a href="{{route('post_show', ['id' => $post->id]) }}">comments</a></div>
                    <div class="ps-2">{{ $post->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">{{$posts->links()}}</div>
</div>
@endsection