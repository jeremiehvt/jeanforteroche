<?php
/**
 * view class controller
 * manages view for admin
 */
class AdminView
{
	/**
	* this method manage post and comment to display on the admin homepage
	* this require view
	*/
	public function adminHome($db)
	{
	   
	    $PostManager = new BackendPostManager($db);
	    $posts = $PostManager->getPosts();

	    $CommentManager = new BackendCommentManager($db);
	    $allcomments = $CommentManager->getAllcomments();

	    $CommentManager = new BackendCommentManager($db);
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
		$PostManager = new BackendPostManager($db);
		$post = $PostManager->getPost($post);

		require ('view/backend/editpost.php');
	}

}