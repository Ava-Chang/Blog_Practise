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

	public function getAllPost()
	{
		return $this->postRepository->getPost();
	}

	public function checkPoster($id, $user)
	{
		return $this->postRepository->getMemberPost($id, $user);
	}

	public function updatePost($params, $id)
	{
		$this->postRepository->updateArticle($params, $id);
	}

	public function addPost($params, $user)
	{
		$this->postRepository->addArticle($params, $user);
	}

	public function delePost($id)
	{
		$this->postRepository->deleteArticle($id);
	}

}

 ?>