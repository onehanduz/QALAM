@extends('layouts.app')

@section('content')
<div class="container">
  <form method="Post" action="/update" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div>
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <label for="first_name" class="form-label">First name*</label>
            <input type="text" class="form-control" id="first_name"  name="first_name" value="{{$user->first_name}}">
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label for="last_name" class="form-label">Last name*</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <label for="username" class="form-label">Username*</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
          </div>
        </div>
        <div class="col">
          <label for="born" class="form-label">Date*</label><br>
          <input type="date" class="form-date form-control-date" id="born" name="born" value="{{$user->born}}" title="Birthday">
        </div>
      </div>
      <div class="form-group m-3">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image"  name="image" value="" required="" multiple>
      </div>
    </div>
    <button type="submit" class="btn btn-primary col-2 mx-auto">Send</button>
  </form>
</div>
@endsection