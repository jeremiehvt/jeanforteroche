<?php
/**
 * admincomment class controller
 * manages newcomment and reportcomment for admin
 */
class AdminComment 
{	
	/**
	* this method send data to the model to delete comment
	*
	* this method redirect to adminhomepage
	*/
	public function deleteComment($db, Coment $coment)
	{
		$CommentManager = new BackendCommentManager($db);
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
		$CommentManager = new BackendCommentManager($db);
		$deleteReportcomment = $CommentManager->deleteReportcomment($reportcoment);
		header('location: index.php?admin=home');
		exit();
	}

}