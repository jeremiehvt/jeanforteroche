<?php

session_start();


require ('controler/frontend/frontend.php');
require ('controler/backend/backend.php');


if (isset($_GET['action'])) 
{


	if ($_GET['action']==='addcomment') 
	{
		if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
        	if (!empty($_POST['comment'])) 
            {
                $comment = new comment();
				$addComment = $comment->addComment();
            }
        }
	}

	elseif ($_GET['action']==='post') 
	{
		if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $view = new view();
			$posts = $view->posts();
        }
	}

	elseif ($_GET['action']==='report') 
	{
		if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $comment = new comment();
			$report = $comment->report();
        }
	}

	elseif ($_GET['action']==='allposts') 
	{
		$view = new view();
		$allposts = $view->allposts();
	}

	elseif ($_GET['action'] === 'connexion') 
	{
		$view = new View();
		$connexion = $view->connexion();
	}


	elseif ($_GET['action'] === 'connectuser') 
	{
		if (isset($_POST['pseudo']) && isset($_POST['password'])) 
		{
			$connexion = new Connexion();
			$connect = $connexion->ConnectUser();
		}
	}
}



elseif (isset($_GET['admin']) && isset($_SESSION['user'])) 
{
	
		if ($_GET['admin'] === 'home')
		{	
			$view = new AdminView();
			$home = $view->adminHome();
		}

		elseif ($_GET['admin'] === 'deletepost') 
		{
			$admin = new AdminPost();
			$deletepost = $admin->deletePost();
		}

		elseif ($_GET['admin'] === 'deletecomment')
		{
			$admin = new AdminComment();
			$deletecomment = $admin->deleteComment();
		}

		elseif ($_GET['admin'] === 'deletereport')
		{
			$admin = new AdminComment();
			$deletereportcomment = $admin->deleteReportcomment();
		}

		elseif ($_GET['admin'] === 'newpost') 
		{
			$view = new AdminView();
			$new = $view->newpost();
		}

		elseif ($_GET['admin'] === 'editpost') 
		{

			$view = new AdminView();
			$edit = $view->editpost();
		}

		elseif ($_GET['admin'] === 'addpost') 
		{
			$admin = new AdminPost();
			$add = $admin->addPost();
		}

		elseif ($_GET['admin'] === 'updatepost') 
		{
			$post = new AdminPost();
			$update = $post->updatePost();
		}
	
}



		
else
{
	$view = new view();
	$home = $view->home();
}

