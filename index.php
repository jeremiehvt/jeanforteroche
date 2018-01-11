<?php

session_start();


require ('controler/frontend/frontend.php');
require ('controler/backend/backend.php');

try
{
	if (!empty($_GET['action']))
	{


		if ($_GET['action']==='addcomment') 
		{
			if (!empty($_GET['id']) && $_GET['id'] > 0) 
	        {
	        	$comment = new comment();
				$addcomment = $comment->addComment();
	        }

	        elseif (empty($_GET['id']) OR !is_int($_GET['id']) OR $_GET['id'] === 0) 
	        {
	        	throw new Exception('Une erreur est survenue');
	        }
		}

		elseif ($_GET['action']==='post') 
		{
			if (!empty($_GET['id']) && $_GET['id'] > 0) 
	        {
	            $view = new view();
				$posts = $view->posts();
	        }

	        elseif (empty($_GET['id']) OR !is_int($_GET['id']) OR $_GET['id'] === 0) 
	        {
	        	throw new Exception('Une erreur est survenue');
	        }
		}

		elseif ($_GET['action']==='report') 
		{
			if (!empty($_GET['id']) && $_GET['id'] > 0) 
	        {
	            $comment = new comment();
				$report = $comment->report();
	        }

	        elseif (empty($_GET['id']) OR !is_int($_GET['id']) OR $_GET['id'] === 0) 
	        {
	        	throw new Exception('Une erreur est survenue');
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
			if (!empty($_POST['pseudo']) && !empty($_POST['password'])) 
			{
				$connexion = new Connexion();
				$connect = $connexion->ConnectUser();
			}

			elseif (empty($_GET['pseudo']) OR empty($_GET['password'])) 
			{
				throw new Exception('Veuillez remplir tout les champs de saisie de texte');
			}
		}

		elseif (!is_string($_GET['action'])) 
		{
			throw new Exception('Une erreur est survenue');
		}

	}



	elseif (!empty($_GET['admin']) && !empty($_SESSION['user'])) 
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

			elseif ($_GET['admin'] === 'deconnexion') 
			{
				$deconnexion = new Connexion();
				$death = $deconnexion->Deconnexion();
			}

			elseif (!is_string($_GET['admin'])) 
			{
				throw new Exception('Une erreur est survenue');
			}
	}

	else
	{
		$view = new view();
		$home = $view->home();
	}


}

catch(Exception $e)
{
	$errormessage = $e->getmessage();
	require('view/frontend/errorview.php');
}