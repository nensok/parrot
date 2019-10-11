@extends('layouts.app')

@section('content')
<br>
<div class="container mt-5">
    <div class="row justify-content-left mb-4">
        <div class="col-md-4 mr-5">
            <div class="card bg-light border-secondary sticky-top ">
                <div class="card-body">
                    <div class="justify-content-center">
                        <img src="{{$user->profile->profileImage()}}" alt="profile_pic" class="rounded-circle w-50">
                    </div>
                    <hr>
                    <div class="mt-2">
                       
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fas fa-user mr-2 text-info"></i>{{$user->name}}</li>
                            <li class="list-group-item"><i class="fas fa-map-marker-alt mr-2 text-danger"></i>{{$user->profile->location}} </li>
                            <li class="list-group-item"><i class="fa fa-user-tie mr-2 text-primary"></i>{{$user->profile->description}}</li>
                            <li class="list-group-item"><i class="fa fa-link mr-2"></i><a href="#">{{$user->profile->url}} </a></li>
                        </ul>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <a href="/p/create" class="btn btn-outline-primary btn-sm"><i class="fas fa-pen"></i> Add New Post</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
        @if( count($posts) > 0 )
        @foreach ($posts as $post)
        <div class="card border-secondary mb-5">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle" style="max-width:50px;">
                        </div>
                        <div>
                            <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->name}}</span></a></div>
                        </div>
                    </div>
                </div>
                <img src="/storage/{{$post->image}}" class="justify-content-center" alt="post_image" style="height: 22rem;" width="100%">
                <div class="card-body">
                        <div class="row">
                            <div class="mt-3">
                                <h5 class="card-title pl-3"><a href="/p/{{$post->id}}"> <h5 class="card-title text-dark">{{$post->title}}</h5></a></h5>
                                <p class="pl-3">{{$post->description}}</p>
                                <p class="card-text pl-3">Source: <a href="http://{{$post->source_link}}"><small class="text-primary">{{$post->source_link ?? 'Not available'}}</small></p></a>
                                <p class="card-text pl-3"><small class="text-muted">Posted {{$post->created_at->diffForHumans()}}</small></p>
                            </div>
                        </div>
                        <hr style="border:0.5px solid #3333">
                        <div class="row ml-2">
                            <like
                                :post-id = {{$post->id}}
                                :likes = {{$post->likes->count()}}
                                :dislike = {{$post->dislikes->count()}}>
                            </like>
                            <span class="text-primary">  </span> <i class="fas fa-comment mr-1" style="font-size:25px;"></i> {{$post->comments->count()}}
                        </div>
                        <hr style="border:0.5px solid #3333">
                        <p>
                            <button class="btn btn-outline-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                See Comments <i class="fas fa-comment mr-1" style="font-size:15px;"></i>
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="scroll">
                                <div>        
                                    <ul class="list-group list-group-flush">
                                        @foreach ($post->comments as $item)
                                            <li class="list-group-item">
                                                <img src="/storage/{{$item->user->profile->image}}" height="30px" width="30px" class="rounded-circle mr-2" />
                                                <a href="/profile/{{$item->user_id}}"><strong class="mr-2">{{$item->user_name}}</strong></a>
                                                {{$item->comment}}                
                                                <div>
                                                    <small>{{$item->created_at->diffForHumans()}}</small>
                                                </div>
                                            </li>      
                                        @endforeach
                                    </ul>
                            </div>            
                        </div>  
                </div>
                <div class="card-footer">
                    <form action="/comment" method="post" class="form-inline">
                        @csrf
                        <div class="form-group">
                            <textarea id="comment" class="form-control-sm form-control" placeholder="Add your Comment" name="comment" cols="62" rows="1" required></textarea>
                            <input id="post_id" type="hidden" value="{{$post->id}}" name="post_id">                               
                            <input id="post_id" type="hidden" value="{{$post->user->id}}" name="user_id">                              
                            <input id="post_id" type="hidden" value="{{Auth()->user()->id}}" name="user_id">                             
                            <input id="post_id" type="hidden" value="{{Auth()->user()->name}}" name="user_name">                             
                            <button type="submit" class="btn btn-outline-primary btn-sm">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
        @else
           <h1> <p class="text-secondary">No Available Post</p> </h1>
        @endif
        </div>
    </div>
</div>
@endsection