<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{

    

    public function store()
    {
        $data = request()->validate([
            'comment' => 'required',
            'post_id' => 'required',
            'user_id' => 'required',
            'user_name' => 'required',
        ]);

        Comment::create($data);

        return redirect('/post');

    }
}
