<?php


require_once('model/frontend/Manager.php');

function home()
{
   
    $PostManager = new jeanforteroche\model\frontend\PostManager();
    $posts = $PostManager->getlastPost(); 

    $PostManager = new jeanforteroche\model\frontend\PostManager();
    $lastposts = $PostManager->getlastPosts(); 

    $CommentManager = new jeanforteroche\model\frontend\CommentManager();
    $allcomments = $CommentManager->getallComments();

   	require_once('view/frontend/home.php');
}

function posts()
{
	$PostManager = new jeanforteroche\model\frontend\PostManager();
	$allposts = $PostManager->getPosts();

	$PostManager = new jeanforteroche\model\frontend\PostManager();
	$post = $PostManager->getPost($_GET['id']);

	$CommentManager = new jeanforteroche\model\frontend\CommentManager();
	$postComments = $CommentManager->getcomments($_GET['id']);

	require 'view/frontend/posts.php';
}

function allposts()
{
	$PostManager = new jeanforteroche\model\frontend\PostManager();
	$allposts = $PostManager->getPosts();

	require 'view/frontend/allposts.php';
}


function postComment($Postid, $comment, $pseudo)
{
	$CommentManager = new jeanforteroche\model\frontend\CommentManager();
	$postcomment = $CommentManager->postComment($Postid, $comment, $pseudo);
}

function contact()
{
	require 'view/frontend/contact.php';
}

function inscription()
{
	require 'view/frontend/inscription.php';
}

function insertuser($nom, $prenom, $pseudo, $mail, $password)
{
	$UsersManager = new jeanforteroche\model\frontend\UsersManager();
	$newUser = $UsersManager->newUser($nom, $prenom, $pseudo, $mail, $password);

	header('index.php');
}