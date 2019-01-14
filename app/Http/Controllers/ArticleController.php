<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Http\Requests\BlogPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function store(BlogPostRequest $request)
    {	
    	$title = $request->title;
    	$content = $request->content;
        $postData = Post::create(
            [
            'title' => $title,
            'content' => $content,
        	'add_user' => Auth::user()->name
        	]);
        
        return redirect('/');
    }

    public function edit(BlogPostRequest $request, $id)
    {
    	$articleData = Post::find($id);
    	$articleData->title = $request->title;
    	$articleData->content = $request->content;
    	$articleData->save();

    	return redirect('/');
    }

    public function delete($id)
    {
    	if (session()->get('user') == Post::find($id)->add_user) {
            $articleData = Post::find($id);
    	    $articleData->delete();

    	   return redirect('/');
        } else {
            return redirect('/');
        }
    }
}
