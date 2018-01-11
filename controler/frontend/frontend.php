<?php


abstract class frontend
{

	public function __construct()
	{
		require_once('model/frontend/Manager.php');
	}

}

class view extends frontend
{


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

	public function report()
	{
		
			$CommentManager = new jeanforteroche\model\frontend\CommentManager();
			$reportComment = $CommentManager->reportComment((int)$_GET['id']);

			header('location: index.php?');
			exit();
	}
}

class Connexion extends frontend
{
	public function ConnectUser()
	{
		$User = new jeanforteroche\model\frontend\User();
		$ConnectUser = $User->ConnectUser($_POST['pseudo'],$_POST['password']);

	}

	public function Deconnexion()
	{
		$_SESSION = array();
		session_destroy();
		header('location: index.php');
	}
}

