@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
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
    @endforeach
    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endsection