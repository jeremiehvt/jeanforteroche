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
		$CommentManager = new CommentManager($db);
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
		
			$CommentManager = new CommentManager($db);
			$reportComment = $CommentManager->reportComment($report);

			header('location: index.php?');
			exit();
	}

	//ADMIN

	/**
	* this method send data to the model to delete comment
	*
	* this method redirect to adminhomepage
	*/
	public function deleteComment($db, Coment $coment)
	{
		$CommentManager = new CommentManager($db);
		$deleteComment = $CommentManager->deleteComment($coment);
		

		header('location: index.php?admin=home');
		exit();
	}

	/**
	* this method send data to the model to delete reportcomment
	*
	* this method redirect to adminhomepage
	*/
	public function deleteReportcomment($db, ReportComment $reportcoment)
	{
		$CommentManager = new CommentManager($db);
		$deleteReportcomment = $CommentManager->deleteReportcomment($reportcoment);
		header('location: index.php?admin=home');
		exit();
	}
}