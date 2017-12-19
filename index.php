<?php
//user

require ('controler/frontend/frontend.php');


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
	
}

elseif (isset($_GET['page'])) 
{
	if ($_GET['page']==='allposts') 
	{
		$view = new view();
		$allposts = $view->allposts();
	}
}
		
else
{
	$view = new view();
	$home = $view->home();
}

