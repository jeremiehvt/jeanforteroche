<?php
/**
 * view class controller
 * manages view for visitor
 */
class ViewController
{

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function home($db)
	{
	   
	    $PostManager = new PostManager($db);
	 	$lastpost = $PostManager->getLastPost();

	 	$PostManager = new PostManager($db);
	 	$lastposts = $PostManager->getLastPosts();

	    $CommentManager = new CommentManager($db);
	    $allcomments = $CommentManager->getAllcomments();
	    
	   	require('view/frontend/home.php');
	}

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function posts($db, post $post,coment $coment)
	{
		$PostManager = new PostManager($db);
		$allposts = $PostManager->getPosts();

		$PostManager = new PostManager($db);
		$post = $PostManager->getPost($post);

		$CommentManager = new CommentManager($db);
		$postComments = $CommentManager->getcomments($coment);

		require('view/frontend/posts.php');
	}

	/**
	* this method manage post to display on the user postpage
	* this require view
	*/
	public function allposts($db)
	{
		$PostManager = new PostManager($db);
		$allposts = $PostManager->getPosts();

		require ('view/frontend/allposts.php');
	}

	public function connexion()
	{
		require ('view/frontend/connexion.php');
	}

	//ADMIN 

	/**
	* this method manage post and comment to display on the admin homepage
	* this require view
	*/
	public function adminHome($db)
	{
	   
	    $PostManager = new PostManager($db);
	    $posts = $PostManager->getPosts();

	    $CommentManager = new CommentManager($db);
	    $allcomments = $CommentManager->getAllcomments();

	    $CommentManager = new CommentManager($db);
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
	public function editpost($db, $post)
	{
		$PostManager = new PostManager($db);
		$post = $PostManager->getPost($post);

		require ('view/backend/editpost.php');
	}
}