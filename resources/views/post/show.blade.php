@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-3 mt-1">
        <div class="card col-5">
            @if($post->image)
            <img src="../../{{ $post->image }}" class="w-100">
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
                @if (Auth::user()->id == $post->user->id )
                <div class="d-flex">
                    <div><a href="{{ route('post_edit', ['id'=>$post->id]) }}">Edit</a></div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-3 mb-3 col-4">
        <form action="{{ route('comment_store', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf 
          <div class="mb-3">
            <label for="text" class="form-label">Text*</label>
            <input type="text" class="form-control @error('text') is-invalid @enderror" id="text" name="text">

            @error('text')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    @foreach($post->comments()->get() as $comment)
        <div class="row p-3 mt-1">
                <div class="card col-4">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->text }}</p>
                        <div class="d-flex">
                            <div><a href="{{ route('show', ['id'=>$comment->author->id]) }}">{{ $comment->author->username }}</a></div>
                            <div class="ps-2">{{$comment->created_at}}</div>
                        </div>
                        @if (Auth::user()->id == $comment->author->id )
                        <div class="d-flex">
                        <form action="{{ route('comment_edit', ['id'=>$comment->id]) }}" method="GET">
                                @method('GET')
                                @csrf
                                <div><button type="submit" class="btn btn-outline-primary"> Edit</button></div>
                            </form>
                            <form action="{{ route('comment_delete', ['id'=>$comment->id]) }}" method="post" class="ps-3">
                                @method('delete')
                                @csrf
                                <div><button type="submit" class="btn btn-outline-danger"> Delete</button></div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
        </div>
    @endforeach
</div>
@endsection