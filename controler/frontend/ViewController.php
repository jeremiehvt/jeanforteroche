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
	   
	    $PostManager = new FrontendPostManager($db);
	 	$lastpost = $PostManager->getLastPost();

	 	$PostManager = new FrontendPostManager($db);
	 	$lastposts = $PostManager->getLastPosts();

	    $CommentManager = new FrontendCommentManager($db);
	    $allcomments = $CommentManager->getAllcomments();
	    
	   	require('view/frontend/home.php');
	}

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function posts($db, $Postid)
	{
		$PostManager = new FrontendPostManager($db);
		$allposts = $PostManager->getPosts();

		$PostManager = new FrontendPostManager($db);
		$post = $PostManager->getPost($Postid);

		$CommentManager = new FrontendCommentManager($db);
		$postComments = $CommentManager->getcomments($Postid);

		require('view/frontend/posts.php');
	}

	/**
	* this method manage post to display on the user postpage
	* this require view
	*/
	public function allposts($db)
	{
		$PostManager = new FrontendPostManager($db);
		$allposts = $PostManager->getPosts();

		require ('view/frontend/allposts.php');
	}

	public function connexion()
	{
		require ('view/frontend/connexion.php');
	}
}