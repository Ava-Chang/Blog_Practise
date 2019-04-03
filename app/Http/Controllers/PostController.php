<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;
use App\Services\PostService;
use Auth;

class PostController extends Controller
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
    protected $postService = null;

    function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function indexPage()
    {
        $blogs = $this->postService->getAllPost();

        return view('home')->with('blogs', $blogs);
    }

    public function createPage()
    {
        return view('create');
    }

    public function editPage($id)
    {
        $article = $this->postService->checkPoster($id, Auth::user()->name);

        if ($article) {
            return view('edit')->with('article', $article);
        } else {
            return redirect('/');
        }
    }

    public function createPost(BlogPostRequest $request)
    {
        $this->postService->addPost($request->all(), Auth::user()->name);

        return redirect('/');
    }


    public function editPost(BlogPostRequest $request, $id)
    {
        $articleData = $this->postService->checkPoster($id, Auth::user()->name);
        if ($articleData) {
            $this->postService->updatePost($request->all(), $id);
        }
        return redirect('/');
    }

     public function deletePost($id)
    {
        $checkPoster = $this->postService->checkPoster($id, Auth::user()->name);
        if ($checkPoster) {
            $this->postService->delePost($id);
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
}
