<?php
/**
 * adminpost class controller
 * manages newpost for admin
 */
class AdminPost 
{	
	/**
	* this method send data to the model to add newpost
	* this method verify the return value
	* this method redirect to adminhomepage
	*/
	public function addPost($db, Post $post)
	{
		$PostManager = new PostManager($db);
		$addPost = $PostManager->addPost($post);

		if ($addPost === FALSE) 
		{
			throw new Exception('Une erreur est survenue');
		}

		else
		{
			header('location: index.php?admin=home');
			exit();
		}
		
	}

	/**
	* this method send data to the model to update post
	* this method verify the return value 
	* this method redirect to adminhomepage
	*/
	public function updatePost($db, Post $post)
	{
		$PostManager = new PostManager($db);
		$updatePost = $PostManager->updatePost($post);

		if ($updatePost === FALSE) 
		{
			throw new Exception('Une erreur est survenue');
		}
		else
		{
			header('location: index.php?admin=home');
			exit();
		}
		
	}

		/**
	* this method send data to the model to delete post
	*
	* this method redirect to adminhomepage
	*/
	public function deletePost($db, Post $post)
	{
		$PostManager = new PostManager($db);
		$deletePost = $PostManager->deletePost($post);

		header('location: index.php?admin=home');
		exit();
	}
}