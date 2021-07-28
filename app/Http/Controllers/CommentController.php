<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{


	public function create()
    
    {
        return view('comments.create');
    }

	public function store(Request $request)
    { 
		    $crud = new Comment;
		    $crud->enter_text=$request->get('enter_text');
		    $crud->post_id=$request->get('post_id');
		    $crud->save();
    }

    public function getComment($id)
    {   
        $post = Post::find($id);
        
        return $comment->with('post', $post->comment);
    }
}

