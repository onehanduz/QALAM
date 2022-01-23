@extends('layouts.app')

@section('content')
<div class="container">
  <form class="mt-3">
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="first_name" class="form-label">First name*</label>
          <input type="text" class="form-control" id="first_name">
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label for="lart_name" class="form-label">Last name*</label>
          <input type="text" class="form-control" id="lart_name">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="username" class="form-label">username*</label>
          <input type="text" class="form-control" id="username">
        </div>
      </div>
      <div class="col">
        <label for="date" class="form-label">Date*</label><br>
        <input type="date" class="form-date form-control-date" id="date" value="" title="Born date">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="password" class="form-label">New password*</label>
          <input type="password" class="form-control" id="password">
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label for="password" class="form-label">Old password*</label>
          <input type="password" class="form-control" id="password">
        </div>
      </div>
    </div>
    <div class="form-group m-3">
      <label for="image">Image</label>
      <input type="file" class="form-control-file" id="image">
    </div>
    <div class="row">
      <button type="submit" class="btn btn-primary col-2 mx-auto">Send</button>
    </div>
  </form>
</div>
@endsection