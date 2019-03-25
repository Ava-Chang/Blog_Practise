<?php 
namespace App\Repositories;

use App\Entities\Post;
use Auth;

class PostRepository
{
	public function getPost($id = null)
	{	
		if ($id) {
			return Post::find($id);
		} else{
			return Post::orderBy('updated_at', 'desc')
						->get();
		}
	}

	public function getAuth()
	{
		return Auth::user();
	}

	public function updateArticle($params, $id)
	{
		return Post::where('id', $id)
					->update([
						'title' => $params['title'],
						'content' => $params['content']
					]);
	}

	public function addArticle($params)
	{
		return Post::create([
            	'title' => $params['title'],
            	'content' => $params['content'],
            	'add_user' => Auth::user()->name
            	]);
	}

	public function deleteArticle($id)
	{
		Post::where('id', $id)
			->delete();
	}

}


 ?>