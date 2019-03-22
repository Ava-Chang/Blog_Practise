<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BlogService;

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
    protected $blogService = null;

    function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {   
        $blogs = $this->blogService->getAllPost();
        return view('home')
                ->with('blogs', $blogs);
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id = null)
    {   
        $checkPoster = $this->blogService->checkPoster($id);
        if ($checkPoster) {
            $article = $this->blogService->getAllPost($id);
            return view('edit')
                    ->with('article', $article);
        } else {
            return redirect('/');
        }
    }
}
