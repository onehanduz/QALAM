@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-md-center">
        <div class="col-3">
            @if($user->image)
            <img src="./{{ $user->image }}" class="w-100 rounded-circle">
            @endif
        </div>
        <div class="col-9 p-3">
            <div class="d-flex">
                <div>
                    <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
                </div>
            </div>
            <div class="fw-bold">Username: {{ $user->username }}</div>
            <div class="fw-bold">Birthday [y/m/d]: {{ $user->born }}</div>
            <div class="d-flex fw-bold">
                <div class="pe-3">{{ $user->posts->count() }} post</div>
                <div class="pe-3">{{ $user->follow->count() }} follower</div>
                <div class="pe-3">{{ $user->following->count() }} following</div>
            </div>
            <div class="d-grid gap-2">
                <div class="mt-3">
                    <a href="{{ route('edit') }}">
                        <button type="button" class="btn btn-outline-primary btn-m">Edit profile</button>
                    </a>
                </div>
                <div class="mt-1">
                    <a href="{{ route('change') }}">
                        <button type="button" class="btn btn-outline-primary btn-m">Change password</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @foreach ($user->posts as $post)
    <div class="row p-3 mt-1">
        <div class="card col-5">
            @if($post->image)
            <img src="./{{ $post->image }}" class="w-100">
            @endif
            <div class="card-body">
                <p class="card-text">{{ $post->text }}</p>
                <div class="d-flex">
                    <div class="mt-2"><p>{{ $post->likes->count() }}</p></div>
                    
                    <form action="{{ route('like', ['id'=>$post->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="ps-2">
                            <button type="submit" class="btn btn-outline-primary">Like</button>
                        </div>
                    </form>
                    
                    <form action="{{ route('dislike', ['id'=>$post->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="ps-2">
                            <button type="submit" class="btn btn-outline-danger">Dislike</button>
                        </div>
                    </form>
                    <div class="mt-2 ps-2"><p>{{ $post->dislikes->count() }}</p></div>
                </div>
                <div class="d-flex">
                    <div><a href="{{ route('show', ['id'=>$post->user->id]) }}">{{ $post->user->username }}</a></div>
                    <div class="ps-2"><a href="{{route('post_show', ['id' => $post->id]) }}">comments</a></div>
                    <div class="ps-2">{{ $post->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
