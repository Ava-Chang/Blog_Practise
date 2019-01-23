<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Post;

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
    	return $data;
    	// return Post::all();
    }
}
