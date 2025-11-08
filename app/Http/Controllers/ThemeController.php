<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
class ThemeController extends Controller
{
    public function index(){
        $blogs = Blog::paginate(4);
        return view("theme.index", compact('blogs'));

    }
    public function category(int $id){
        $categoryName = Category::find($id)->name;
        $blogs = Blog::where('category_id', $id)->paginate(4);
        return view("theme.category" , compact('blogs'));
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
            return view("theme.singleblog");
        }
        
      
}

