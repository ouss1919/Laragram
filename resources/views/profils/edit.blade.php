@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="form-label text-md-right pr-4">{{ __('Title')}}</label>
                            <input id="title" type="string" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') ?? $user->profile->title}}">
                            @error('title')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="description" class="form-label text-md-right pr-4">{{
                                __('Description')}}</label>
                            <input id="description" type="string"
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                value="{{ old('description') ?? $user->profile->description}}">
                            @error('description')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="link" class="form-label text-md-right pr-4">{{ __('Link')}}</label>
                            <input id="link" type="string" class="form-control @error('link') is-invalid @enderror"
                                name="link" value="{{ old('link') ?? $user->profile->link}}">
                            @error('link')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="image" class="form-label text-md-right">{{ __('Profile Image') }}</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            @error('image')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class=" form-group row pt-4">
                            <button class="btn btn-primary">Save Profile</button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection