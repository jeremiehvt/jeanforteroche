<?php
namespace controler;
/**
 * view class controller
 * manages view
 */
class ViewController
{

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function home($db)
	{
	   
	    $PostManager = new \model\PostManager($db);
	 	$lastpost = $PostManager->getLastPost();

	 	$PostManager = new \model\PostManager($db);
	 	$lastposts = $PostManager->getLastPosts();

	    $CommentManager = new \model\CommentManager($db);
	    $allcomments = $CommentManager->getAllcomments();

	    $UserManager = new \model\UserManager($db);
	    $user = $UserManager->getInfos();
	    
	   	require('view/frontend/home.php');
	}

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function posts($db, \entity\post $post,\entity\coment $coment)
	{
		$PostManager = new \model\PostManager($db);
		$allposts = $PostManager->getPosts();

		$PostManager = new \model\PostManager($db);
		$post = $PostManager->getPost($post);

		$CommentManager = new \model\CommentManager($db);
		$postComments = $CommentManager->getcomments($coment);

		require('view/frontend/posts.php');
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function allposts($db)
	{
		$PostManager = new \model\PostManager($db);
		$allposts = $PostManager->getPosts();

		require ('view/frontend/allposts.php');
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function connexion()
	{
		require ('view/frontend/connexion.php');
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function forgotpassword()
	{
		require ('view/frontend/forgotpassword.php');
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function controlid()
	{
		require ('view/frontend/controlid.php'); 
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function newpassword()
	{

		require ('view/frontend/newpassword.php'); 
	}

	//ADMIN 

	/**
	* this method manage post and comment to display on the admin homepage
	* this require view
	*/
	public function adminHome($db)
	{
	   
	    $PostManager = new \model\PostManager($db);
	    $posts = $PostManager->getPosts();

	    $CommentManager = new \model\CommentManager($db);
	    $allcomments = $CommentManager->getAllcomments();

	    $CommentManager = new \model\CommentManager($db);
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
	public function editpost($db,\entity\post $post)
	{
		$PostManager = new \model\PostManager($db);
		$post = $PostManager->getPost($post);

		require ('view/backend/editpost.php');
	}

	/**
	* this method display profil admin view
	*/
	public function profil($db)
	{
		$UserManager = new \model\UserManager($db);
	    $user = $UserManager->getInfos();
		require('view/backend/profil.php'); 
	}

	/**
	* this method display setprofil admin view
	*/
	public function editProfil($db)
	{
		$UserManager = new \model\UserManager($db);
	    $user = $UserManager->getInfos();
		require('view/backend/setprofil.php'); 
	}
}