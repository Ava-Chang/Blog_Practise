<?php 
namespace App\Services;

use App\Repositories\BlogRepository;
use App\Entities\Post;
use Auth;

class BlogService{

	protected $blogRepository = null;

	function __construct(BlogRepository $blogRepository)
	{
		$this->blogRepository = $blogRepository;
	}

	public function getAllPost($id = null)
	{
		return $this->blogRepository->getPost($id);
	}

	public function checkPoster($id = null)
	{	
		$authUser = $this->blogRepository->getAuth();
		$post = $this->blogRepository->getPost($id);
		if ($authUser->name == $post->add_user) {
			return true;
		} else{
			return false;
		}
	}


}

 ?>