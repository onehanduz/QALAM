@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-3 mt-1">
        <div class="card col-5">
            <img src="" class="w-100">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex">
                    <div class="mt-2"><p>1 liked</p></div>
                    <div class="ps-2"><a href="#"><button type="button" class="btn btn-outline-danger">Like</button></a></div>
                </div>
                <div class="d-flex">
                    <div><a href="#">@username</a></div>
                    <div class="ps-2"><a href="#">comments</a></div>
                    <div class="ps-2">date</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection