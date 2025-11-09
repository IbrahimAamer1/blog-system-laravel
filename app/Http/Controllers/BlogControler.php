<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Storage;
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
      //change the name of the image
      $NewImageName = time() . '.' . $image->getClientOriginalName();
      //store the new image
      $image->storeAs('public/blogs', $NewImageName);
      //update the data
      $data['image'] = $NewImageName;
      //set the user id of the blog
      $data['user_id'] = Auth::user()->id;
      //create the blog
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
        if(Auth::check() && Auth::user()->id == $blog->user_id){
            return view('theme.blogs.edit', compact('blog'));
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateBlogRequest $request, Blog $blog)
    {
        if(Auth::check() && Auth::user()->id == $blog->user_id){
        
        $data = $request->validated();
        if($request->hasFile('image')){
            //delete the old image
            Storage::delete('public/blogs/' . $blog->image);
            //get the old image
            $image = $request->image;
            //change the name of the image
            $NewImageName = time() . '.' . $image->getClientOriginalName();
            //store the new image
            $image->storeAs('public/blogs', $NewImageName);
            //update the data   
            $data['image'] = $NewImageName;
        }
        //update the blog
        $blog->update($data);
        //redirect to the my blogs page
        return redirect()->back()->with('blog_updated', 'Blog updated successfully');
        }
        abort(403, 'Unauthorized action.');
    }       

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if(Auth::check() && Auth::user()->id == $blog->user_id){
            //delete the old image
            Storage::delete('public/blogs/' . $blog->image);
            //delete the blog
            $blog->delete();
            //redirect to the my blogs page
            return redirect()->back()->with('blog_deleted', 'Blog deleted successfully');
        }
        abort(403, 'Unauthorized action.');
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
