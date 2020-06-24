@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <form action="/post-update/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row mt-5">
            <div class="col-8 offset-2">

                <div class="row pt-4 mb-5">
                    <h2> Edit - {{$post->title}}</h2>
                </div>
            
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Story Header') }}</label>
                        
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}"  autocomplete="title" autofocus>
                        
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Image File') }}</label>

                    <input type="file" name="image" id="image" class="form-control-file">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Story Content') }}</label>
                            
                    <textarea id="description" class="form-control @error('title') is-invalid @enderror" name="description">{{$post->description}}</textarea>
                            
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-success">Update Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection 