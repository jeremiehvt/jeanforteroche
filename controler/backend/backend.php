<?php


abstract class backend
{

	public function __construct()
	{
		require_once('model/backend/Manager.php');
	}

}

class view extends backend
{

	public function home()
	{
	   
	    $PostManager = new jeanforteroche\model\backend\PostManager();
	    $lastposts = $PostManager->getPosts();

	    $CommentManager = new jeanforteroche\model\backend\CommentManager();
	    $allcomments = $CommentManager->getAllcomments();

	    $CommentManager = new jeanforteroche\model\backend\CommentManager();
	    $allcomments = $CommentManager->getReportcomments();

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


class post extends backend
{
	public function add()
	{
		$CommentManager = new jeanforteroche\model\backend\PostManager();
		$addPost = $CommentManager->addPosts($_GET['id'], $_POST['comment'], $_POST['title']);
	}

	public function update()
	{
		$CommentManager = new jeanforteroche\model\backend\PostManager();
		$updatePost = $CommentManager->updatePost($_GET['id'], $_POST['comment'], $_POST['title']);
	}
	
	public function delete()
	{
		$CommentManager = new jeanforteroche\model\backend\PostManager();
		$deletePost = $CommentManager->deletePost($_GET['id']);
	}
}

class comment extends backend
{
	public function delete()
	{
		$CommentManager = new jeanforteroche\model\backend\CommentManager();
		$deleteComment = $CommentManager->postComment($_GET['id']);
	}
}


