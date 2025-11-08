<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;

class BlogControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            return view('theme.blogs.create');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
      $data = $request->validated();
      //store image in public/images
      $image = $request->image;
      $NewImageName = time() . '.' . $image->getClientOriginalName();
      $image->storeAs('public/blogs', $NewImageName);
      $data['image'] = $NewImageName;
      $data['user_id'] = Auth::user()->id;
      Blog::create($data);
      return redirect()->back()->with('blog_created', 'Blog created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
     return view("theme.singleblog",compact('blog'));
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('blog_deleted', 'Blog deleted successfully');
    }
     /**
     * Display all the blogs of the user.
     */
    public function myBlogs()
    {
        if(Auth::check()){
            $blogs = Blog::where('user_id', Auth::user()->id)->get();
            return view('theme.blogs.my-blogs', compact('blogs'));
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
}
