<?php
//user

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
	
}

elseif (isset($_GET['page'])) 
{
	if ($_GET['page']==='allposts') 
	{
		$view = new view();
		$allposts = $view->allposts();
	}
}

elseif (isset($_GET['admin'])) 
{
	if ($_GET['admin']==='home') 
	{
		$view = new AdminView();
		$home = $view->adminHome();
	}
}
		
else
{
	$view = new view();
	$home = $view->home();
}

