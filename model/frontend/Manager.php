<?php

namespace jeanforteroche\model\frontend;

abstract class Manager
{	
	protected $db;

	public function __construct()
	{
		$this->dbConnect();
	}

    public function dbConnect()
    
	{
		$db = new \PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', 'root',array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
       
       $this->db = $db;
	}
}

class PostManager extends Manager
{
	
	public function getlastPost()
    {
        
        $req = $this->db->query
        (
			'SELECT id, post newpost, title newtitle, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
			FROM posts p
			
			ORDER BY id DESC LIMIT 1 '
    	);

        return $req;
    }

    public function getlastPosts()
    {
      

        $req = $this->db->query
        (
			'SELECT id, post , title, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
			FROM posts 
			ORDER BY id DESC LIMIT 5'
    	);
    	
        return $req;
    }

    public function getPosts()
    {
        
        $req = $this->db->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts ORDER BY id DESC ');

        return $req;
    }

    public function getPost($Postid)

    {
    	    $req = $this->db->prepare('  SELECT id, p.title select_title, p.post select_post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
    	    	FROM posts p
    	    	WHERE id = ? ');
    	    $req->execute(array($Postid));
        return $req;
    }
}

class CommentManager extends Manager
{
	public function getallComments()
	{
		$req = $this->db->query('SELECT id, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments ORDER BY date_comment DESC');
		return $req;
	}

	public function getComments($Postid)
	{
		$req = $this->db->prepare('SELECT id, id_post, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments WHERE id_post = ? ORDER BY id DESC LIMIT 0, 10');
		$req->execute(array($Postid));
		return $req;
	}

	public function postComment($Postid, $comment)
	{
		$req = $this->db->prepare('INSERT INTO comments(id_post, comment, date_comment) VALUES (?,?,NOW())');
		$postcomment = $req->execute(array($Postid, $comment));
		return $postcomment;
	}

	public function reportComment($Postid)
	{
		$req = $this->db->prepare('INSERT INTO reportcomments(id_comment) VALUES (?)');
		$reportcomment = $req->execute(array($Postid));
		return $reportcomment;
	}
}


