<?php

session_start();

require ('controler/frontend/controlerfrontendautoloader.php');
require ('controler/backend/controlerbackendautoloader.php');
require ('model/modelautoloader.php');
require ('model/frontend/modelfrontendautoloader.php');
require ('model/backend/modelbackendautoloader.php');
require ('model/entity/modelentityautoloader.php');


$db = DBFactory::dbConnect();

try
{
	if (!empty($_GET['action']))
	{


		if ($_GET['action']==='addcomment') 
		{
			if (!empty($_GET['id']) && $_GET['id'] > 0)
	        {
	        	$Coment = new Coment(['idpost' => (int)$_GET['id'], 'comment' => $_POST['comment']]);
	        	$CommentController = new CommentController();
				$CommentController->addComment($db, $Coment);
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
	            $view = new ViewController();
				$view->posts($db, $_GET['id']);
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
	        	$report = new ReportComment(['idcomment' => $_GET['id']]);
	            $CommentController = new CommentController();
				$CommentController->report($db, $report);
	        }

	        elseif (empty($_GET['id']) OR !is_int($_GET['id']) OR $_GET['id'] === 0) 
	        {
	        	throw new Exception('Une erreur est survenue');
	        }
		}

		elseif ($_GET['action']==='allposts')
		{
			$view = new viewController();
			$view->allposts($db);
		}

		elseif ($_GET['action'] === 'connexion') 
		{
			$view = new ViewController();
			$view->connexion();
		}


		elseif ($_GET['action'] === 'connectuser') 
		{
			if (!empty($_POST['pseudo']) && !empty($_POST['password'])) 
			{	
				$user = new User(['pseudo'=>$_POST['pseudo'],'password'=>$_POST['password']]);
				$connexion = new ConnexionController();
				$connexion->ConnectUser($db, $user);
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
				$view->adminHome($db);
			}

			elseif ($_GET['admin'] === 'deletepost') 
			{
				if (!empty($_GET['id'])) 
				{	
					$post = new Post(['id'=>$_GET['id']]);
					$admin = new AdminPost();
					$admin->deletePost($db,$post);
				}

				else
				{
					throw new Exception("l'url doit contenir un identifiant valide");
					
				}	
			}

			elseif ($_GET['admin'] === 'deletecomment')
			{
				if (!empty($_GET['id'])) 
				{
					$coment = new Coment(['id'=>$_GET['id']]);
					$admin = new AdminComment();
					$admin->deleteComment($db, $coment);
				}

				else
				{
					throw new Exception("l'url doit contenir un identifiant valide");
				}
				
			}

			elseif ($_GET['admin'] === 'deletereport')
			{
				if (!empty($_GET['id'])) 
				{
					$reportcoment = new ReportComment(['idcomment'=>$_GET['id']]);
					$admin = new AdminComment();
					$admin->deleteReportcomment($db, $reportcoment);
				}

				else
				{
					throw new Exception("l'url doit contenir un identifiant valide");
				}	
			}

			elseif ($_GET['admin'] === 'newpost') 
			{
				$view = new AdminView();
				$view->newpost();
			}

			elseif ($_GET['admin'] === 'editpost') 
			{
				if (!empty($_GET['id'])) 
				{
					$post = new Post(['id'=>$_GET['id']]);
					$view = new AdminView();
					$view->editpost($db, $post);
				}

				else
				{
					throw new Exception("l'url doit contenir un identifiant valide");
				}	
			}

			elseif ($_GET['admin'] === 'addpost') 
			{
				if (!empty($_POST['title']) && !empty($_POST['post'])) 
				{
					$post = new Post(['title'=>$_POST['title'], 'post'=>$_POST['post']]);
					$admin = new AdminPost();
					$admin->addPost($db, $post);
				}
				
				else
				{
					throw new Exception("les champs ne peuvent pas être vide");	
				}
			}

			elseif ($_GET['admin'] === 'updatepost') 
			{

				if (!empty($_POST['title']) && !empty($_POST['post'])) 
				{
					$post = new Post(['id'=>$_GET['id'],'title'=>$_POST['title'], 'post'=>$_POST['post']]);
					$update = new AdminPost();
					$update->updatePost($db,$post);
				}
				
				else
				{
					throw new Exception("les champs ne peuvent pas être vide");	
				}
			}

			elseif ($_GET['admin'] === 'deconnexion') 
			{
				$deconnexion = new Connexion();
				$deconnexion->Deconnexion($db);
			}

			elseif (!is_string($_GET['admin'])) 
			{
				throw new Exception('Une erreur est survenue');
			}
	}

	else
	{
		$view = new ViewController();
		$view->home($db);
	}


}

catch(Exception $e)
{
	$errormessage = $e->getmessage();
	require('view/frontend/errorview.php');
}