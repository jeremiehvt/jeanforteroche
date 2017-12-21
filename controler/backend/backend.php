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
		
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$post = $PostManager->getPost($_GET['id']);

		require('view/frontend/newpost.php'); 
	}

	public function editpost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$post = $PostManager->getPost($_GET['id']);

		require ('view/frontend/editpost.php');
	}
}


class AdminPost extends backend
{
	public function addPost()
	{
		$CommentManager = new jeanforteroche\model\backend\PostManager();
		$addPost = $CommentManager->addPosts((int)$_GET['id'], $_POST['comment'], $_POST['title']);

		header('location: index.php?admin=home');
		exit();
	}

	public function updatePost()
	{
		$CommentManager = new jeanforteroche\model\backend\PostManager();
		$updatePost = $CommentManager->updatePost((int)$_GET['id'], $_POST['comment'], $_POST['title']);

		header('location: index.php?admin=home');
		exit();
	}
	
	public function deletePost()
	{
		$CommentManager = new jeanforteroche\model\backend\PostManager();
		$deletePost = $CommentManager->deletePost((int)$_GET['id']);
		$deleteComment = $CommentManager->deleteComment((int)$_GET['id']);
		$deleteReportcomment = $CommentManager->deleteReportcomment((int)$_GET['id']);

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


