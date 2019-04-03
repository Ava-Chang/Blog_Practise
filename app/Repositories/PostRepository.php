<?php

namespace App\Repositories;

use App\Entities\Post;

class PostRepository
{
	public function getPost($id = null)
	{
		return Post::orderBy('updated_at', 'desc')->get();
	}

	public function getMemberPost($id, $user)
	{
		return Post::where('id', $id)
					->where('add_user', $user)
					->first();
	}

	public function updateArticle($params, $id)
	{
		return Post::where('id', $id)
					->update([
						'title' => $params['title'],
						'content' => $params['content']
					]);
	}

	public function addArticle($params, $user)
	{
		Post::create([
        	'title' => $params['title'],
        	'content' => $params['content'],
        	'add_user' => $user
        ]);
	}

	public function deleteArticle($id)
	{
		Post::where('id', $id)->delete();
	}
}