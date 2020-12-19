@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Add a new post</h1>
            </div>
            <form action="/p" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row">
                    <label for="name" class="form-label text-md-right pr-4">{{ __('Post Caption')}}</label>
                    <input id="caption" type="string" class="form-control @error('caption') is-invalid @enderror"
                        name="caption" value="{{ old('caption') }}">
                    @error('caption')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="image" class="form-label text-md-right">{{ __('Post Image') }}</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class=" form-group row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection