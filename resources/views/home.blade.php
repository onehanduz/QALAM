@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="image/profile.png" class="w-100 rounded-circle">
        </div>
        <div class="col-8 p-5">
            <div class="d-flex">
                <div><h1>firstname larstname</h1></div>
                <div class="mt-1"><a href="#" class="p-1"><button type="button" class="btn btn-primary">Follow</button></a></div>
            </div>
            <div>@username</div>
            <div>date</div>
            <div class="d-flex">
                <div class="pe-3">post</div>
                <div class="pe-3">followers</div>
                <div class="pe-3">following</div>
            </div>
            <div class="mt-1"><a href="#"><button type="button" class="btn btn-outline-primary">Edit</button></a></div>
        </div>
    </div>
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
                    <div>date</div>
                    <div class="ps-2"><a href="#">comments</a></div>
                </div>
            </div>
        </div>
    </div>
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
                    <div>date</div>
                    <div class="ps-2"><a href="#">comments</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
