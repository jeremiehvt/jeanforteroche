<?php
namespace model;

/**
 * class commentManager
 * this class manage all interaction with db for comments
 */
class CommentManager
{	

	protected $db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

    public function setDB($db)
    
	{  
       $this->db = $db;
	}
	/**
	* 
	* this method select all comments
	*/
	public function getAllcomments()
	{
		$req = $this->db->query('SELECT id, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments ORDER BY date_comment DESC');
		$req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, '\entity\Coment');
		$allcomments = $req->fetchall();
		return $allcomments;
	}

	/**
	* 
	* this method select all comments from a post
	*/
	public function getComments(\entity\coment $coment)
	{
		$req = $this->db->prepare('SELECT id, id_post, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments WHERE id_post = :postid ORDER BY id DESC LIMIT 0, 10');
		$req->bindValue(':postid',$coment->getIdpost());
		$req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, '\entity\Coment');
		$req->execute();
		$comments = $req->fetchall();
		return $comments;
	}

	/**
    * 
    * this method select reportcomments
    */
	public function getReportcomments()
	{
		$req = $this->db->query('SELECT DISTINCT id_comment FROM reportcomments ORDER BY id_comment DESC ');
	    $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, '\entity\reportcomment');
        $reportcomments = $req->fetchall();
		return $reportcomments;
	}

	/**
	* 
	* this method insert a new comment
	*/
	public function postComment(\entity\Coment $coment)
	{
		$req = $this->db->prepare('INSERT INTO comments(id_post, comment, date_comment) VALUES (:postid,:comment,NOW())');
		$req->bindValue(':postid', $coment->getIDpost());
		$req->bindValue(':comment', $coment->getComment());	
		$req->execute();
	}

	/**
	* 
	* this method insert a new comment in reportcomment
	*/
	public function reportComment(\entity\ReportComment $report)
	{
		$req = $this->db->prepare('INSERT INTO reportcomments(id_comment) VALUES (:idcoment)');
		$req->bindValue(':idcoment',$report->getIdcomment());
		$req->execute();
		
	}

	 /**
    * 
    * this method delete a comment
    */
	public function deleteComment(\entity\Coment $coment)

    {
    	$req = $this->db->prepare(' DELETE FROM comments WHERE id = :id');
        $req->bindValue(':id',$coment->getID());
        $req->execute();
    	$deleteComment = $req->execute();
        return $deleteComment;
    }

    /**
    * 
    * this method delete a reportcomment
    */
    public function deleteReportcomment(\entity\ReportComment $reportcoment)

    {
        $req = $this->db->prepare(' DELETE FROM reportcomments WHERE id_comment = :id');
        $req->bindValue(':id',$reportcoment->getIdcomment());
        $req->execute();
        $deleteReportcomment = $req->execute();
        return $deleteReportcomment;
    }
}