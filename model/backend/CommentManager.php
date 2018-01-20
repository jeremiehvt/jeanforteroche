<?php
namespace jeanforteroche\model\backend;
/**
 * class commentmanager
 * this class manage all interaction with db to select, insert, or delete comments
 */
class CommentManager extends Manager
{
	/**
    * 
    * this method select comments
    */
    public function getAllcomments()
	{
		$req = $this->db->query('SELECT id, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments ORDER BY id DESC');
		return $req;
	}

    /**
    * 
    * this method select reportcomments
    */
	public function getReportcomments()
	{
		$req = $this->db->query('SELECT DISTINCT id_comment FROM reportcomments ORDER BY id_comment DESC ');
	
		return $req;
	}

    /**
    * 
    * this method delete a comment
    */
	public function deleteComment($Postid)

    {
    	$req = $this->db->prepare(' DELETE FROM comments WHERE id = ?');
    	$deleteComment = $req->execute(array($Postid));
        return $deleteComment;
    }

    /**
    * 
    * this method delete a reportcomment
    */
    public function deleteReportcomment($Postid)

    {
        $req = $this->db->prepare(' DELETE FROM reportcomments WHERE id_comment = ?');
        $deleteReportcomment = $req->execute(array($Postid));
        return $deleteReportcomment;
    }
}