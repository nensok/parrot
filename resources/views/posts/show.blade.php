@extends('layouts.app')

@section('content')
<div class="container"><br>
    <div class="row mt-5">
        <div class="col-5">
            <div class="card bg-light border-light">
                <img src="/storage/{{$post->image}}" alt="" class="w-100 mb-3">
                <p class="pl-3"><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"> <img src="{{$post->user->profile->profileImage()}}" class=" rounded-circle w-50 mr-2" style="max-width:40px"><span class="text-dark">{{$post->user->username}}</span></a></span> {{$post->title}}</p>
               
                <p class="pl-3">{{$post->description}}</p>
                <hr style="border:0.5px solid #3333">
                <div class="d-flex align-items-center pl-3 pb-2">
                    <div class="pr-5">
                        Likes <strong>{{$post->likes->count()}}</strong> 
                    </div>
                    <div class="pr-5">
                        Dislikes <strong>{{$post->dislikes->count()}}</strong> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7 scroll">
            <div>
                <div class="d-flex align-items-center mb-3">
                    <div class="pr-3">
                       <h3>Comments</h3>
                    </div>
                </div>
                {{-- <img src="{{$post->user->profile->profileImage()}}" alt="" class="w-50 rounded-circle" > --}}
                <ul class="list-group list-group-flush">
                    @foreach ($post->comments as $item)
                        <li class="list-group-item">
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
</div>
@endsection 