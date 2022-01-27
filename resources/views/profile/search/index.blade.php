@extends('layouts.app')

@section('content')
<div class="container">
  <div class="mt-3">
  <form action="{{ route('search_put') }}" method="post">
    @method('PUT')
    @csrf 
    <div class="mb-3">
      <label for="username" class="form-label">Username*</label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username">

      @error('username')
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