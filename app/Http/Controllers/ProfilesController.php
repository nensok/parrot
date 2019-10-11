<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\User;
use App\Post;
use Storage;


class ProfilesController extends Controller
{

   
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = $user->posts->count();
       

        $followersCount = $user->profile->followers->count();

        $followingCount = $user->following->count();
        


        return view('profiles.index', compact('user', 'posts', 'follows','postCount','followersCount','followingCount'));
    }

    public function edit(User $user)
    {

        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {

        $this->authorize('update', $user->profile);

        $data = request()->validate([

            'location' => 'required',
            'url' => 'url',
            'description' => 'required',
            'image' => 'max:5000',
        ]);

        
        if(request('image')){



            $imagePath = request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            if (File::exists($imagePath)){
                delete($imagePath);
            }
            $image->save(); 
            
            $imageArray =  ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
 
        
        return redirect('/profile/'. auth()->user()->id);
    }

}
