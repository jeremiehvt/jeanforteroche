<?php

namespace jeanforteroche\model\backend;

/**
 * backend abstract class Manager
 * this class conteinn only two methods to init db 
 */
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

/**
 * class PostManager
 * this class manage all interaction with db to select, update, insert, or delete posts
 */
class PostManager extends Manager
{


    /**
    * 
    * this method select allpost
    */
    public function getPosts()
    {
        
        $req = $this->db->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts ORDER BY id DESC ');

        return $req;
    }

    /**
    * 
    * this method select onepost
    */
    public function getPost($Postid)

    {
    	    $req = $this->db->prepare('  SELECT id, p.title select_title, p.post select_post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts p WHERE id = ? ');
    	    $req->execute(array($Postid));
        return $req;
    }

    /**
    * 
    * this method insert post
    */
    public function addPost($post,$title)

    {
    	    $req = $this->db->prepare(' INSERT INTO posts(post,title,date_post) VALUES(?,?,NOW())');
    	    $addPost = $req->execute(array($post,$title));
        return $addPost;
    }

    /**
    * 
    * this method update post
    */
    public function updatePost($title, $post, $Postid)

    {
    	    $req = $this->db->prepare(' UPDATE posts SET title = ?, post = ? WHERE id = ?');
    	    $updatePost = $req->execute(array($title, $post, $Postid));
        return $updatePost;
    }

    /**
    * 
    * this method delete a post
    */
    public function deletePost($Postid)

    {
    	    $req = $this->db->prepare(' DELETE FROM posts WHERE id = ?');
    	   $deletePost = $req->execute(array($Postid));
        return $deletePost;
    }
}

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





