@extends('layouts.app')

@section('content')
<div class="container">
  <div class="mt-3">
  <form action="{{ route('comment_update',['id'=>$comment->id]) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf 
    <div class="mb-3">
      <label for="text" class="form-label">Text*</label>
      <input type="text" class="form-control @error('text') is-invalid @enderror" id="text" name="text" value="{{ $comment->text }}">

      @error('text')
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