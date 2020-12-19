@extends('layouts.app')

@section('content')
<div class="container">
    <div>@foreach($profiles as $profile)
        <div class="row">
            <div class="col-1 d-flex justify-content-end"></div>
            <div class="col-11 d-flex justify-content align-items-center">
                <a href="/profile/{{$profile->user_id}}"><img src="{{$profile->getImage()}}" class="rounded-circle mr-3"
                        style="max-width: 50px;"></a>
                <div class="font-weight-bold mr-5"><a href="/profile/{{$profile->user_id}} " class="text-dark"
                        style="text-decoration: none;">{{$profile->user->userName}}</a></div>
                <div class="mr-5"><strong>{{$profile->user->posts->count()}}</strong> publications</div>
                <div class="mr-5"><strong>{{$profile->user->profile->followers->count()}}</strong> followers</div>
                <div class="mr-5"><strong>{{$profile->user->following->count()}}</strong> following</div>
                <div class="font-weight-bold"><a href="{{$profile->link}}">
                        {{$profile->link}}
                    </a></div>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
    <div class="row">
        <div class="col-3 d-flex justify-content-center">
            {{$profiles->onEachSide(5)->links()}}
        </div>
    </div>

</div>
@endsection