<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Post;
use App\Http\Requests\BlogPostRequest;

class getPostController extends Controller
{
    public function indexApi()
    {	
    	$post = Post::all();
    	$data =[];
    	foreach ($post as $key => $info) {
    		$title = $info['title'];
    		$content = $info['content'];
    		$postdata = [
    			'title' => $title,
    			'content' => $content,
    		];
    		$data[] = $postdata;
    	}
    	return response()->json($postdata);
    	// return Post::all();
    }

    public function createApi(BlogPostRequest $request)
    {   
        $data = [];
        $title = $request->title;
        $content = $request->content;
        $post = Post::create([
            'title' => $title,
            'content' => $content,
        ]);

        $data[] = $post;
        return response()->json($data);
    }
}
