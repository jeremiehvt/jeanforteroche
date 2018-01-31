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

	    $UserManager = new \model\UserManager($db);
	    $user = $UserManager->getInfos();

	    $CommentManager = new \model\CommentManager($db);
		$LastComments = $CommentManager->getLastComments();

		foreach ($lastpost as $data) 
	    {
	    	$coment = new \entity\Coment(['idpost' => $data->getID() ]);

	    	$CommentManager = new \model\CommentManager($db);
	    	$getcomments = $CommentManager->getComments($coment);
	    }
	    
	   	require('view/frontend/home.php');
	}

	/**
	* this method manage post and comment to display on the user homepage
	* this require view
	*/
	public function posts($db, \entity\post $post,\entity\coment $coment , $url)
	{
		$PostManager = new \model\PostManager($db);
		$allposts = $PostManager->getPosts();

		$PostManager = new \model\PostManager($db);
		$post = $PostManager->getPost($post);

		$CommentManager = new \model\CommentManager($db);
		$postComments = $CommentManager->getcomments($coment);

		if (isset($url) && $url === 'adminposts')
		{
			
			require('view/backend/posts.php');
		}

		else
		{
			require('view/frontend/posts.php');
		}
		
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function allPosts($db, $url)
	{
		$PostManager = new \model\PostManager($db);
		$allposts = $PostManager->getPosts();

		$CommentManager = new \model\CommentManager($db);
	    $allcomments = $CommentManager->getAllComments();

	    $CommentManager = new \model\CommentManager($db);
	    $reportcomments = $CommentManager->getReportcomments();
		

		if (isset($url) && $url === 'adminallposts') 
		{
			require ('view/backend/allposts.php');
		}

		else
		{
			require ('view/frontend/allposts.php');
		}
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
	public function forgotPassword()
	{
		require ('view/frontend/forgotpassword.php');
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function controlId()
	{
		require ('view/frontend/controlid.php'); 
	}

	/**
	* this method manage post to display on the user postpage
	* require a view
	*/
	public function newPassword()
	{

		require ('view/frontend/newpassword.php'); 
	}



	/**
	* this method manage post and comment to display on the admin homepage
	* this require view
	*/
	public function adminHome($db)
	{
	   
	    $PostManager = new \model\PostManager($db);
	    $posts = $PostManager->getlastPosts();

	    $CommentManager = new \model\CommentManager($db);
	    $lastcomments = $CommentManager->getLastComments();

	    $CommentManager = new \model\CommentManager($db);
	    $reportcomments = $CommentManager->getReportcomments();

	    $UserManager = new \model\UserManager($db);
	    $user = $UserManager->getInfos();

	   	require('view/backend/home.php');
	}

	/**
	* this method display view to publish new post
	* 
	*/
	public function newPost()
	{

		require('view/backend/newpost.php'); 
	}

	/**
	* this method manage post data to display on the updatepost page
	* this require view
	*/
	public function editPost($db,\entity\post $post)
	{
		$PostManager = new \model\PostManager($db);
		$post = $PostManager->getPost($post);

		require ('view/backend/editpost.php');
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