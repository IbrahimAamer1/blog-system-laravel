<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class ThemeController extends Controller
{
    public function index(){
        $blogs = Blog::paginate(4);
        return view("theme.index", compact('blogs'));

    }
    public function category(){
        return view("theme.category");
    }

    public function contact(){
            return view("theme.contact");
        }
        public function login(){
            return view("theme.login");
        }
        public function register(){
            return view("theme.register");
        }
        public function singleblog(){
            $blog = Blog::find(request()->id);
            if(!$blog){
                return redirect()->route("theme.index");
            }
            $blogs = Blog::paginate(4);
            return view("theme.singleblog", compact('blog', 'blogs'));
        }
      
}

