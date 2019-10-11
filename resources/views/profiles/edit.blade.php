@extends('layouts.app')

@section('content')
<div class="container">
    <br>
        <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH ')
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row mt-4">
                        <h2> Edit Profile </h2>
                    </div>
                
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">{{ __('Location') }}</label>
                            
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') ?? $user->profile->location }}"  autocomplete="location" >
                            
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label">{{ __('URL') }}</label>
                                
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" >
                                
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
    
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
    
                        <input type="file" name="image" id="image" class="form-control-file">
    
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">{{ __('Bio') }}</label>
                                
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ old('title') ?? $user->profile->description }}</textarea>
                                
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
    
                    <div class="row pt-4">
                        <button  class="btn btn-primary btn-sm"> Save Profile</button>
                    </div>
                
                </div>
            </div>
        </form>
</div>
@endsection
