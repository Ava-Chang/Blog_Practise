<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function store(Request $request)
    {	
    	$request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]);
    	$title = $request->input('title');
    	$content = $request->input('content');
        $postData = Post::create(
            [
            'title' => $title,
            'content' => $content,
        	'add_user' => Auth::user()->name
        	]);
        return redirect('/');
    }

    public function edit(Request $request, $id)
    {
    	$request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]);
    	$articleData = Post::find($id);
    	$articleData->title = $request->title;
    	$articleData->content = $request->content;
    	$articleData->save();

    	return redirect('/');
    }

    public function delete($id)
    {
    	$articleData = Post::find($id);
    	$articleData->delete();

    	return redirect('/');
    }
}
