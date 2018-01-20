<?php


/**
 * class commentManager
 * this class manage all interaction with db to select or insert comments
 */
class FrontendCommentManager
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
		$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Coment');
		$allcomments = $req->fetchall();
		return $allcomments;
	}

	/**
	* 
	* this method select all comments from a post
	*/
	public function getComments($Postid)
	{
		$req = $this->db->prepare('SELECT id, id_post, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments WHERE id_post = :postid ORDER BY id DESC LIMIT 0, 10');
		$req->bindValue(':postid',$Postid);
		$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Coment');
		$req->execute();
		$comments = $req->fetchall();
		return $comments;
	}

	/**
	* 
	* this method insert a new comment
	*/
	public function postComment(Coment $coment)
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
	public function reportComment(ReportComment $report)
	{
		$req = $this->db->prepare('INSERT INTO reportcomments(id_comment) VALUES (:idcoment)');
		$req->bindValue(':idcoment',$report->getIdcomment());
		$req->execute();
		
	}
}