<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request){
        
        $data = $request->validated();
        Comment::create($data);
        return redirect()->back()->with('comment_created', 'Comment created successfully');
    }
}

