<?php
namespace controler;
/**
 * Comment class controller
 * manages commments 
 */
class CommentController 
{	
	/**
	* this method manage new comment data to send to the manager
	* this method verify the return value 
	* this method redirect to the post page
	*/
	public function addComment($db, \entity\Coment $coment)
	{
		$CommentManager = new \model\CommentManager($db);
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
	public function report($db, \entity\ReportComment $report)
	{
		
			$CommentManager = new \model\CommentManager($db);
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
	public function deleteComment($db, \entity\Coment $coment)
	{
		$CommentManager = new \model\CommentManager($db);
		$deleteComment = $CommentManager->deleteComment($coment);
		

		header('location: index.php?admin=home');
		exit();
	}

	/**
	* this method send data to the model to delete reportcomment
	*
	* this method redirect to adminhomepage
	*/
	public function deleteReportcomment($db, \entity\ReportComment $reportcoment)
	{
		$CommentManager = new \model\CommentManager($db);
		$deleteReportcomment = $CommentManager->deleteReportcomment($reportcoment);
		header('location: index.php?admin=home');
		exit();
	}
}