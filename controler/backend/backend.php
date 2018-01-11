<?php

/**
 * backend abstract class controller
 * first instruction, add construct method with include model manager
 */
abstract class backend
{

	public function __construct()
	{
		require_once('model/backend/Manager.php');
	}
}

/**
 * view class controller
 * manages view for admin
 */
class AdminView extends backend
{

	/**
	* this method manage post and comment to display on the admin homepage
	* this require view
	*/
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

	/**
	* this method display view to publish new post
	* 
	*/
	public function newpost()
	{

		require('view/backend/newpost.php'); 
	}

	/**
	* this method manage post data to display on the updatepost page
	* this require view
	*/
	public function editpost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$post = $PostManager->getPost($_GET['id']);

		require ('view/backend/editpost.php');
	}

}

/**
 * adminpost class controller
 * manages newpost for admin
 */
class AdminPost extends backend
{	
	/**
	* this method send data to the model to add newpost
	* this method verify the return value
	* this method redirect to adminhomepage
	*/
	public function addPost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$addPost = $PostManager->addPost($_POST['post'], $_POST['title']);

		if ($addPost === FALSE) 
		{
			throw new Exception('Une erreur est survenue');
		}

		else
		{
			header('location: index.php?admin=home');
			exit();
		}
		
	}

	/**
	* this method send data to the model to update post
	* this method verify the return value 
	* this method redirect to adminhomepage
	*/
	public function updatePost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$updatePost = $PostManager->updatePost($_POST['title'],$_POST['post'],(int)$_GET['id']);

		if ($updatePost === FALSE) 
		{
			throw new Exception('Une erreur est survenue');
		}
		else
		{
			header('location: index.php?admin=home');
			exit();
		}
		
	}
	
	/**
	* this method send data to the model to delete post
	*
	* this method redirect to adminhomepage
	*/
	public function deletePost()
	{
		$PostManager = new jeanforteroche\model\backend\PostManager();
		$deletePost = $PostManager->deletePost((int)$_GET['id']);

		header('location: index.php?admin=home');
		exit();
	}
}

/**
 * admincomment class controller
 * manages newcomment and reportcomment for admin
 */
class AdminComment extends backend
{	
	/**
	* this method send data to the model to delete comment
	*
	* this method redirect to adminhomepage
	*/
	public function deleteComment()
	{
		$CommentManager = new jeanforteroche\model\backend\CommentManager();
		$deleteComment = $CommentManager->deleteComment((int)$_GET['id']);
		

		header('location: index.php?admin=home');
		exit();
	}

	/**
	* this method send data to the model to delete reportcomment
	*
	* this method redirect to adminhomepage
	*/
	public function deleteReportcomment()
	{
		$CommentManager = new jeanforteroche\model\backend\CommentManager();
		$deleteReportcomment = $CommentManager->deleteReportcomment((int)$_GET['id']);
		header('location: index.php?admin=home');
		exit();
	}

}




