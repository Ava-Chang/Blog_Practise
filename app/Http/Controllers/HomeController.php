<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\App;
use App\Entities\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $blogs = Post::all();
        return view('home')
                ->with('blogs', $blogs);
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {   
        if (Auth::user()->name == Post::find($id)->add_user) {
            $article = Post::find($id);
            return view('edit')
                    ->with('article', $article);
        } else {
            return redirect('/');
        }
    }
}
