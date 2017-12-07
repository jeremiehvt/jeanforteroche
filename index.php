<?php
//user
require ('controler/frontend/frontend.php');

if (isset($_GET['id']) && $_GET['id']>0) 
{
	posts();
}

elseif (isset($_GET['commentid']) && $_GET['commentid']>0) 
{	
	$pseudo = 'jeremie';

	if (isset($_POST['comment'])) 
	{	
		postcomment($_GET['commentid'], $_POST['comment'], $pseudo);
	}
	else
	{
		home();
		
	}
}

elseif (isset($_GET['page'])) 
{
	if ($_GET['page'] == 'allposts') 
	{
		allposts();
	}

	elseif ($_GET['page'] == 'contact') 
	{
		contact();
	}

	elseif ($_GET['page'] == 'inscription') 
	{
		inscription();
	}

	else
	{
		home();
		
	}
}


elseif (isset($_GET['user']))
{
	if ($_GET['user'] == 'new') 
	{
		insertuser($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['mail'], $_POST['password']);
	}

	else
	{
		home();
	}
}

else
{
	home();
}

//admin