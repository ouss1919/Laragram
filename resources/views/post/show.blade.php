@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="d-flex justify-content-center">
                <img src="\storage\{{ $post->image }}" class="w-100 rounded" style="max-width: 400px;">
            </div>
        </div>
        <div class="col-6">
            <div class="justify-content-start">
                <div class="d-flex align-items-center">
                    <img src="{{$post->user->profile->getImage()}}" class="rounded-circle mr-3"
                        style="max-width: 40px;">
                    <div class="font-weight-bold mr-5"><a href="/profile/{{$post->user->id}} " class="text-dark"
                            style="text-decoration: none;">{{$post->user->userName}}</a>
                    </div>
                    @cannot('update', $post->user->profile)
                    <follow-button user_id="{{$post->user->id}}" follows="{{$follows}}"></follow-button>
                    @endcannot
                </div>
                <hr>
                <p>{{$post->caption}}</p>
            </div>
        </div>
    </div>
</div>
@endsection