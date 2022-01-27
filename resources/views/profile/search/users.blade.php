@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($users as $user)
    
    <div class="row align-items-md-center">
        <div class="col-3 mb-5">
            @if($user->image)
            <img src="../{{ $user->image }}" class="w-100 rounded-circle">
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
                <div class="fw-bold"><a href="{{ route('show', ['id'=>$user->id]) }}">View Profile</a></div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection