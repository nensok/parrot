<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert;
use App\Post;
use App\Comment;
use App\Like;
use App\Dislike;
use App\User;
use Auth;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {

        $posts= Post::orderBy('created_at','desc')->simplePaginate(5);
        
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

       if(session('success_message')){
        Alert::success('Success', session('success_message'));
       }

        return view('posts.index', compact('posts', 'user'));
        //dd($posts);
    }


     public function create()
     {
         return view('posts.create');
     }

     public function store()
     {
         $data = request()->validate([

            'title' => 'required',
            'description' => 'required',
            'source_link' => '',
            'image' => 'required|image',
         ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'source_link' => $data['source_link'],
            'image' => $imagePath
        ]);
        
        return redirect('/post');
     }

     public function show(Post $post)
     {
        
        return view('posts.show', compact('post'));
     }

     public function edit(Post $post)
     {
        $this->authorize('update', $post->user->profile);

         return view('posts.edit', compact('post'));
     }

     public function update(Post $post)
     {

        $post->update($this->validateRequest());
        $this->storeImage($post);
       
       return redirect('/profile/' . auth()->user()->id);
     }

     public function destroy(Post $post)
     {
        $post->delete();

        return redirect('/profile/' . auth()->user()->id);
     }

     public function like(request $request)
     {
         //checking user like
         $likecheck = like::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();
         if ($likecheck){
             $likecheck = like::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->delete();
             return 'deleted';
         }else{
 
             $like = new like;
             $like->user_id = Auth::user()->id;
             $like->post_id = $request->id;
             $like->save();
             $dislikecheck = Dislike::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->delete();
         }
     }

     public function dislike(request $request)
     {
         //checking user like
         $dislikecheck = Dislike::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();
         if ($dislikecheck){
             $dislikecheck = Dislike::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->delete();
             return 'deleted';
         }else{
 
             $dislike = new Dislike;
             $dislike->user_id = Auth::user()->id;
             $dislike->post_id = $request->id;
             $dislike->save();
             $likecheck = like::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->delete();
         }
     }

     public function getlike(Request $request)
     {
          return Post::with('likes')->get();
     } 


    //  private function validateRequest()
    //  {
    //      return request()->validate([
 
    //         'title' => 'required',
    //         'description' => 'required',
    //         'image' => 'sometimes|file|image|max:5000',
             
    //      ]);
    //  }
    //  private function storeImage($post)
    //  {
    //      if (request()->has('image')){
    //          $post->update([
    //              'image' => request()->image->store('uploads','public'),
    //          ]);
    //      }
    //  }

    private function validateRequest()
    {
        return tap(request()->validate([

            'title' => 'required',
            'description' => 'required',
            
        ]),function(){

            if(request()->hasFile('image')){
                request()->validate([
                    'image'=>'file|image|max:5000',
                ]);
            }
        });
    }
    private function storeImage($post)
    {
        if (request()->has('image')){
            $post->update([
                'image' => request()->image->store('uploads','public'),
            ]);
        }
    }


}


