<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Entities\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('auth.login');
        } else {
            //登入用戶寫入session
            $userName = Auth::user();
            session()->put(['user' => $userName->name]);
            $sessionUser = session()->get('user');
            $blogs = Post::all();
            return view('home')
                    ->with('userName', $userName)
                    ->with('blogs', $blogs)
                    ->with('sessionUser', $sessionUser);
        }
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {   
        // dd(Post::find($id)->add_user);
        if (session()->get('user') == Post::find($id)->add_user) {
            $article = Post::find($id);
            return view('edit')
                    ->with('article', $article);
        } else {
            return redirect('/');
        }
    }
}
