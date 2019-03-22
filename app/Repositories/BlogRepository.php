<?php 
namespace App\Repositories;

use App\Entities\Post;
use Auth;

class BlogRepository
{
	public function getPost($id = null)
	{	
		if ($id) {
			return Post::find($id);
		} else{
			return Post::all();
		}
	}

	public function getAuth()
	{
		return Auth::user();
	}
}


 ?>