<?php

/**
 * class commentmanager
 * this class manage all interaction with db to select, insert, or delete comments
 */
class BackendCommentManager
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
    * this method select comments
    */
    public function getAllcomments()
	{
		$req = $this->db->query('SELECT id, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments ORDER BY id DESC');
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'coment');
        $allcomments = $req->fetchall();
		return $allcomments;
	}

    /**
    * 
    * this method select reportcomments
    */
	public function getReportcomments()
	{
		$req = $this->db->query('SELECT DISTINCT id_comment FROM reportcomments ORDER BY id_comment DESC ');
	    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'reportcomment');
        $reportcomments = $req->fetchall();
		return $reportcomments;
	}

    /**
    * 
    * this method delete a comment
    */
	public function deleteComment(Coment $coment)

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
    public function deleteReportcomment(ReportComment $reportcoment)

    {
        $req = $this->db->prepare(' DELETE FROM reportcomments WHERE id_comment = :id');
        $req->bindValue(':id',$reportcoment->getIdcomment());
        $req->execute();
        $deleteReportcomment = $req->execute();
        return $deleteReportcomment;
    }
}