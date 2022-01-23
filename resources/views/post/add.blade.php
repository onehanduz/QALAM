@extends('layouts.app')

@section('content')
<div class="container">
  <form class="mt-3">
    <div class="mb-3">
      <label for="text" class="form-label">Text*</label>
      <input type="text" class="form-control" id="text">
    </div>
    <div class="form-group m-3">
      <label for="image">Image</label>
      <input type="file" class="form-control-file" id="image">
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
  </form>
</div>
@endsection