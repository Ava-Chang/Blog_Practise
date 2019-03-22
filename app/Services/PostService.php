<?php 
namespace App\Services;

use App\Repositories\PostRepository;
use App\Entities\Post;
use Auth;

class PostService{

	protected $postRepository = null;

	function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	public function getAllPost($id = null)
	{
		return $this->postRepository->getPost($id);
	}

	public function checkPoster($id = null)
	{	
		$authUser = $this->postRepository->getAuth();
		$post = $this->postRepository->getPost($id);
		if ($authUser->name == $post->add_user) {
			return true;
		} else{
			return false;
		}
	}

	public function updatePost($params, $id)
	{
		$this->postRepository->updateArticle($params, $id);
	}

	public function addPost($params)
	{
		$this->postRepository->addArticle($params);
	}

	public function delePost($id)
	{
		$this->postRepository->deleteArticle($id);
	}

}

 ?>