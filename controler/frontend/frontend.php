<?php

/**
 * frontend abstract class controller
 * first instruction, add construct method with include model manager
 */
abstract class frontend
{

	public function __construct()
	{
		require_once('model/frontend/Manager.php');
	}

}

/**
 * view class controller
 * manages view for visitor
 */
class view extends frontend
{

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function home()
	{
	   
	    $PostManager = new jeanforteroche\model\frontend\PostManager();
	    $posts = $PostManager->getlastPost(); 

	    $PostManager = new jeanforteroche\model\frontend\PostManager();
	    $lastposts = $PostManager->getlastPosts(); 

	    $CommentManager = new jeanforteroche\model\frontend\CommentManager();
	    $allcomments = $CommentManager->getallComments();

	   	require('view/frontend/home.php');
	}

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function posts()
	{
		$PostManager = new jeanforteroche\model\frontend\PostManager();
		$allposts = $PostManager->getPosts();

		$PostManager = new jeanforteroche\model\frontend\PostManager();
		$post = $PostManager->getPost($_GET['id']);

		$CommentManager = new jeanforteroche\model\frontend\CommentManager();
		$postComments = $CommentManager->getcomments($_GET['id']);

		require('view/frontend/posts.php');
	}

	/**
	* this method manage post to display on the user postpage
	* this require view
	*/
	public function allposts()
	{
		$PostManager = new jeanforteroche\model\frontend\PostManager();
		$allposts = $PostManager->getPosts();

		require ('view/frontend/allposts.php');
	}

	public function connexion()
	{
		require ('view/frontend/connexion.php');
	}
}

class comment extends frontend
{	
	/**
	* this method manage new comment data to send to the model 
	* this method verify the return value 
	* this method redirect to the post page
	*/
	public function addComment()
	{
		$CommentManager = new jeanforteroche\model\frontend\CommentManager();
		$postComments = $CommentManager->postComment((int)$_GET['id'], $_POST['comment']);

		if ($postComments === FALSE) 
		{
			throw new Exception('Une erreur est survenue');
		}

		else
		{
			header('location: index.php?action=post&id='.(int)$_GET['id']);
			exit();
		}
		
	}

	/**
	* this method manage data of reportcomment to send to the model 
	* 
	* this method redirect to the homepage
	*/
	public function report()
	{
		
			$CommentManager = new jeanforteroche\model\frontend\CommentManager();
			$reportComment = $CommentManager->reportComment((int)$_GET['id']);

			header('location: index.php?');
			exit();
	}
}

/**
 * connection class controller
 * manages data to send to the model
 */
class Connexion extends frontend
{	
	/**
	* this method manage data of connectionform to send to the model 
	* 
	* 
	*/
	public function ConnectUser()
	{
		$User = new jeanforteroche\model\frontend\User();
		$ConnectUser = $User->ConnectUser($_POST['pseudo'],$_POST['password']);

	}

	/**
	* this method end admin connection
	* 
	* 
	*/
	public function Deconnexion()
	{
		$_SESSION = array();
		session_destroy();
		header('location: index.php');
	}
}

