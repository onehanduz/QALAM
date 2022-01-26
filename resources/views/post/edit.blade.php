@extends('layouts.app')

@section('content')
<div class="container">
  <div class="mt-3">
  <form action="{{ route('post_update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf 
    <div class="mb-3">
      <label for="text" class="form-label">Text*</label>
      <input type="text" class="form-control @error('text') is-invalid @enderror" id="text" name="text" value="{{ $post->text }}">

      @error('text')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group mt-3 mb-3">
      <label for="image">Image</label>
      <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
      
      @error('image')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
  </form>
  </div>
</div>
@endsection