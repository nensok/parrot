@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5">
            <div class="col-8 offset-2">

                <div class="row pt-4">
                    <h2> Add New Post</h2>
                </div>
            
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Post Title') }}</label>
                        
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>
                        
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Post File') }}</label>

                    <input type="file" name="image" id="image" class="form-control-file">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Post Content') }}</label>
                            
                    <textarea id="description" class="form-control @error('title') is-invalid @enderror" name="description" value="{{ old('title') }}"  autocomplete="description" rows="8"></textarea>
                            
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Source Link ( *If Any )') }}</label>
                        
                    <input id="source_link" type="text" placeholder="https://your source" class="form-control @error('source link') is-invalid @enderror" name="source_link" value="{{ old('source_link') }}"  autocomplete="source_link" autofocus>
                        
                        @error('Source_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary"> Add New Post</button>
                </div>
            
            </div>
        </div>
    </form>
</div>
@endsection 