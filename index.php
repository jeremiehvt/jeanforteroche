<?php

session_start();



require ('controler/Autoloader.php');
require ('model/Autoloader.php');
require ('entity/Autoloader.php');

\controler\Autoloader::register();
\model\Autoloader::register();
\entity\Autoloader::register();

$db = \model\DBFactory::dbConnect();

try
{
	if (!empty($_GET['action']))
	{

		if ($_GET['action']==='addcomment')
		{
			if (!empty($_GET['id']) && $_GET['id'] > 0)
	        {
	        	$Coment = new \entity\Coment(['idpost' => $_GET['id'], 'comment' => $_POST['comment']]);
	        	$CommentController = new \controler\CommentController();
				$CommentController->addComment($db, $Coment);
	        }

	        elseif (empty($_GET['id']) OR !is_int($_GET['id']) OR $_GET['id'] === 0) 
	        {
	        	throw new \Exception('Une erreur est survenue');
	        }
		}

		elseif ($_GET['action']==='post')
		{
			if (!empty($_GET['id']) && $_GET['id'] > 0) 
	        {	
	        	$post = new \entity\Post(['id'=>$_GET['id']]);
	        	$coment = new \entity\Coment(['idpost' => $_GET['id']]);
	            $view = new \controler\ViewController();
				$view->posts($db, $post, $coment);
	        }

	        elseif (empty($_GET['id']) OR !is_int($_GET['id']) OR $_GET['id'] === 0) 
	        {
	        	throw new \Exception('Une erreur est survenue');
	        }
		}

		elseif ($_GET['action']==='report') 
		{
			if (!empty($_GET['id']) && $_GET['id'] > 0) 
	        {	
	        	$report = new \entity\ReportComment(['idcomment' => $_GET['id']]);
	            $CommentController = new \controler\CommentController();
				$CommentController->report($db, $report);
	        }

	        elseif (empty($_GET['id']) OR !is_int($_GET['id']) OR $_GET['id'] === 0) 
	        {
	        	throw new \Exception('Une erreur est survenue');
	        }
		}

		elseif ($_GET['action']==='allposts')
		{
			$view = new \controler\ViewController();
			$view->allposts($db);
		}

		elseif ($_GET['action'] === 'connexion') 
		{
			$view = new \controler\ViewController();
			$view->connexion();
		}


		elseif ($_GET['action'] === 'connectuser') 
		{
			if (!empty($_POST['pseudo']) && !empty($_POST['password'])) 
			{	
				$user = new \entity\User(['pseudo'=>$_POST['pseudo'],'password'=>$_POST['password']]);
				$connexion = new \controler\ConnexionController();
				$connexion->connectUser($db, $user);
			}

			elseif (empty($_GET['pseudo']) OR empty($_GET['password'])) 
			{
				throw new \Exception('Veuillez remplir tout les champs de saisie de texte');
			}
		}

		elseif ($_GET['action'] === 'forgotpassword') 
		{

			if (!empty($_POST['email']))
			{
				$user = new \entity\User(['email'=>$_POST['email']]);
				$update = new \controler\UserController();
				$update->verifyMail($db, $user);
			}

			else
			{
				$view = new \controler\ViewController();
				$view->forgotpassword();
			}
	
		}

		elseif ($_GET['action'] === 'update') 
		{
			if (!empty($_POST['password']))
			{
				$user = new \entity\User(['password'=>$_POST['password']]);
				$update = new \controler\UserController();
				$update->updatePassword($db, $user);
			}

			elseif (!empty($_POST['altid'])) 
			{
				$user = new \entity\User(['altid'=>$_POST['altid']]);
				$update = new \controler\UserController();
				$update->verifyAltid($db, $user);
			}

			else
			{
				$view = new \controler\ViewController();
				$view->controlid();
			}
			
		}

		elseif (!is_string($_GET['action'])) 
		{
			throw new \Exception('Une erreur est survenue');
		}
	}



	elseif (!empty($_GET['admin']) && !empty($_SESSION['user'])) 
	{
		
			if ($_GET['admin'] === 'home')
			{	
				$view = new \controler\ViewController();
				$view->adminHome($db);
			}

			elseif ($_GET['admin'] === 'deletepost') 
			{
				if (!empty($_GET['id'])) 
				{	
					$post = new \entity\Post(['id'=>$_GET['id']]);
					$admin = new \controler\PostController();
					$admin->deletePost($db,$post);
				}

				else
				{
					throw new \Exception("l'url doit contenir un identifiant valide");
					
				}	
			}

			elseif ($_GET['admin'] === 'deletecomment')
			{
				if (!empty($_GET['id'])) 
				{
					$coment = new \entity\Coment(['id'=>$_GET['id']]);
					$reportcoment = new \entity\ReportComment(['idcomment'=>$_GET['id']]);
					$admin = new \controler\CommentController();
					$admin->deleteComment($db, $coment, $reportcoment);
				}

				else
				{
					throw new \Exception("l'url doit contenir un identifiant valide");
				}
				
			}

		

			elseif ($_GET['admin'] === 'newpost') 
			{
				$view = new \controler\ViewController();
				$view->newpost();
			}

			elseif ($_GET['admin'] === 'editpost') 
			{
				if (!empty($_GET['id'])) 
				{
					$post = new \entity\Post(['id'=>$_GET['id']]);
					$view = new \controler\ViewController();
					$view->editpost($db, $post);
				}

				else
				{
					throw new \Exception("l'url doit contenir un identifiant valide");
				}	
			}

			elseif ($_GET['admin'] === 'updateprofil') 
			{
				if (isset($_GET['id'])) 
				{
					if (empty($_POST['password'])) 
					{
						$user = new \entity\User(['id'=>$_GET['id'],'pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email'], 'bio'=>$_POST['bio']]);
						$UserController = new \controler\UserController();
						$UserController->updateGenerals($db, $user);
					}

					elseif (!empty($_POST['password'])) 
					{
						$user = new \entity\User(['id'=>$_GET['id'],'pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email'], 'password'=>$_POST['password'], 'bio'=>$_POST['bio']]);
						$UserController = new \controler\UserController();
						$UserController->updateAllinfos($db, $user);
					}	
				}
				
				else
				{
					$view = new \controler\ViewController();
					$view->editProfil($db);
				}
				
			}

			elseif ($_GET['admin'] === 'profil') 
			{
				$view = new \controler\ViewController();
				$view->profil($db);
			}

			elseif ($_GET['admin'] === 'addpost') 
			{
				if (!empty($_POST['title']) && !empty($_POST['post'])) 
				{
					$post = new \entity\Post(['title'=>$_POST['title'], 'post'=>$_POST['post']]);
					$admin = new \controler\PostController();
					$admin->addPost($db, $post);
				}
				
				else
				{
					throw new \Exception("les champs ne peuvent pas être vide");	
				}
			}

			elseif ($_GET['admin'] === 'updatepost') 
			{

				if (!empty($_POST['title']) && !empty($_POST['post'])) 
				{
					$post = new \entity\Post(['id'=>$_GET['id'],'title'=>$_POST['title'], 'post'=>$_POST['post']]);
					$update = new \controler\PostController();
					$update->updatePost($db,$post);
				}
				
				else
				{
					throw new Exception("les champs ne peuvent pas être vide");	
				}
			}

			elseif ($_GET['admin'] === 'deconnexion') 
			{
				$deconnexion = new \controler\ConnexionController();
				$deconnexion->deconnexion($db);
			}

			elseif (!is_string($_GET['admin'])) 
			{
				throw new \Exception('Une erreur est survenue');
			}
	}

	else
	{
		$view = new \controler\ViewController();
		$view->home($db);
	}


}

catch(\Exception $e)
{
	$errormessage = $e->getmessage();
	require('view/frontend/errorview.php');
}