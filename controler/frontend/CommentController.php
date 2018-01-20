<?php
class CommentController 
{	
	/**
	* this method manage new comment data to send to the manager
	* this method verify the return value 
	* this method redirect to the post page
	*/
	public function addComment($db, Coment $coment)
	{
		$CommentManager = new FrontendCommentManager($db);
		$postComments = $CommentManager->postComment($coment);

		if ($postComments === FALSE) 
		{
			throw new Exception('Une erreur est survenue');
		}

		else
		{
			header('location: index.php?action=post&id='.(int)$_GET['id']);
			exit();
		}
		
	}

	/**
	* this method manage data of reportcomment to send to the model 
	* 
	* this method redirect to the homepage
	*/
	public function report($db, ReportComment $report)
	{
		
			$CommentManager = new FrontendCommentManager($db);
			$reportComment = $CommentManager->reportComment($report);

			header('location: index.php?');
			exit();
	}
}