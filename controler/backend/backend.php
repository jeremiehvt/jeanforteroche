<?php



abstract class backend
{

	public function __construct()
	{
		require_once('model/backend/Manager.php');
	}

}

class AdminView extends backend
{

	public function adminHome()
	{
	   
	    $PostManager = new jeanforteroche\model\backend\PostManager();
	    $posts = $PostManager->getPosts();

	    $CommentManager = new jeanforteroche\model\backend\CommentManager();
	    $allcomments = $CommentManager->getAllcomments();

	    $CommentManager = new jeanforteroche\model\backend\CommentManager();
	    $reportcomments = $CommentManager->getReportcomments();

	   	require('view/backend/home.php');
	}

	public function newpost()
	{

		require('view/backend/newpost.php'); 
	}

	public function editpost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$post = $PostManager->getPost($_GET['id']);

		require ('view/backend/editpost.php');
	}
}


class AdminPost extends backend
{
	public function addPost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$addPost = $PostManager->addPost($_POST['post'], htmlspecialchars($_POST['post']));

		header('location: index.php?admin=home');
		exit();
	}

	public function updatePost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$updatePost = $PostManager->updatePost($_POST['title'],htmlspecialchars($_POST['post']),(int)$_GET['id']);

		header('location: index.php?admin=home');
		exit();
	}
	
	public function deletePost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$deletePost = $PostManager->deletePost((int)$_GET['id']);

		header('location: index.php?admin=home');
		exit();
	}
}

class AdminComment extends backend
{
	public function deleteComment()
	{
		$CommentManager = new jeanforteroche\model\backend\CommentManager();
		$deleteComment = $CommentManager->deleteComment((int)$_GET['id']);
		$deleteReportcomment = $CommentManager->deleteReportcomment((int)$_GET['id']);

		header('location: location: index.php?admin=home');
		exit();
	}
}


