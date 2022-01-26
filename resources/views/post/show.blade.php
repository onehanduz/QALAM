@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-3 mt-1">
        <div class="card col-5">
            <img src="{{ $post->image }}" class="w-100">
            <div class="card-body">
                <p class="card-text">{{ $post->text }}</p>
                <div class="d-flex">
                    <div class="mt-2"><p>1 liked</p></div>
                    <div class="ps-2"><a href="#"><button type="button" class="btn btn-outline-danger">Like</button></a></div>
                </div>
                <div class="d-flex">
                    <div><a href="{{ route('show', ['id'=>$post->user->id]) }}">{{ $post->user->username }}</a></div>
                    <div class="ps-2"><a href="#">comments</a></div>
                    <div class="ps-2">{{ $post->created_at }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 mb-3 col-4">
        <form action="{{ route('post_store') }}" method="post" enctype="multipart/form-data">
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

    <div class="row p-3 mt-1">
        <div class="card col-4">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex">
                    <div><a href="#">@username</a></div>
                    <div class="ps-2">date</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection