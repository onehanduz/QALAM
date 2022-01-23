@extends('layouts.app')

@section('content')
<div class="container">
    <form action="">
        <label for="search" class="form-label">Search user</label>
        <input class="form-control" list="datalistOptions" id="search" placeholder="Type to search...">
        <datalist id="datalistOptions">
            <option value="San Francisco">
            <option value="New York">
            <option value="Seattle">
        </datalist>
        <button type="submit" class="btn btn-primary mt-3">Send</button>
    </form>
</div>
@endsection