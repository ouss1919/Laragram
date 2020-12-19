@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-5 d-flex justify-content-end">
            <img src="{{$user->profile->getImage()}}" class=" w-100 rounded-circle" style="max-width: 200px;">
        </div>
        <div class="col-8 pt-5 justify-content-start">
            <div class="d-flex align-items-center mb-3">
                <div class="mr-5" style="font-weight: 300; font-size: 28px; color: #262626;">{{$user->userName}}</div>
                @cannot('update', $user->profile)
                <follow-button user_id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                @endcannot
                @can('update', $user->profile)
                <a class="btn btn-outline-primary btn-sm mr-4" href="/p/create">add a post</a>
                <a class="btn btn-outline-primary btn-sm" href="/profils/{{$user->id}}">see all users</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a class="btn btn-outline-primary btn-sm mb-3" href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong> publications</div>
                <div class="pr-3"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="pr-3"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title }}</div>
            <div class="">{{$user->profile->description}}</div>
            <div class="font-weight-bold"><a href="{{$user->profile->link}}">
                    {{$user->profile->link}}
                </a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}"> <img src="/storage/{{$post->image}}" class="rounded">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection