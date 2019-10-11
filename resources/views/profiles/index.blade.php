@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" alt="profile_pic" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user->name}}</div>

                   <follow-button user-id ="{{$user->id}}" follows="{{$follows}} " auth-id = "{{auth::user()->id}}"></follow-button>
                </div>

               @can('update', $user->profile)
                 <a href="/p/create" class="btn btn-outline-primary btn-sm"><i class="fas fa-pen"></i> Add New Post</a>  
               @endcan
            </div>

           @can('update', $user->profile)
             <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
           @endcan
             
            <div class="d-flex mt-2">
                <div class="pr-5"><strong>{{$postCount}}</strong> Posts</div>
                <div class="pr-5"><strong>{{$followersCount}}</strong> Followers</div>
                <div class="pr-5"><strong>{{$followingCount}}</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->name}}</div>
            <div>{{$user->profile->description}}</div>
            <div>{{$user->profile->location }}</div>
            <div><a href="#">{{$user->profile->url}}</a></div> 
        </div>
    </div>

   <div class="row justify-content-center pt-5">
       @if(  count($user->posts) > 0 )
        @foreach($user->posts as $post)
            <div class="col-6 mt-4">
                <div class="card bg-light border-light">
                 <img src="/storage/{{$post->image}}" class="card-img " alt="post_image" style="height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title"><h5 class="card-title text-dark">{{$post->title}}</h5></h5>
                            <p class="card-text">{{$post->description}}</p>
                            <p class="card-text"><small class="text-muted">Posted {{$post->created_at->diffForHumans()}}</small></p>
                            <a href="#" class="card-link"> <i class="fas fa-thumbs-up text-primary"></i> {{$post->likes->count()}}</a>
                            <a href="#" class="card-link"> <i class="fas fa-thumbs-down text-danger"></i> {{$post->dislikes->count()}}</a>
                            <a href="#" class="card-link"> <i class="fas fa-comment text-success"></i> {{$post->comments->count()}}</a>
                        </div>
                        <div class="card-footer">
                           @can('update', $user->profile)
                           <div class="d-flex">
                               <div class="mr-5">
                                    <form action="/post-delete/{{$post->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete <i class="fas fa-trash"></i></button>
                                   </form> 
                               </div>
                               {{-- <div class="justify-content-center">
                                   <a href="/p/{{$post->id}}/edit" class="btn btn-success btn-sm">Edit Post <i class="fas fa-edit"></i> </a>
                               </div> --}}
                           </div>
                           
                           @endcan
                        </div>
                </div>
            </div>
        @endforeach
        @else
        <h1> <p class="text-secondary">You Have No Posts</p> </h1>
     @endif
   </div>
</div>
@endsection
