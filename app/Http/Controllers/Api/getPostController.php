<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;
use App\Http\Controllers\Controller;
use App\Services\PostService;

use App\Entities\Post;

class getPostController extends Controller
{   
    protected $postService = null;

    function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function indexApi()
    {	
        $post = $this->postService->getAllPost();
    	$data =[];
        //針對所需要的資料做整理
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
    }

    public function createApi(BlogPostRequest $request)
    {   
        $newPost = $this->postService->addPost($request->all());
        return response()->json($newPost);
    }
}
