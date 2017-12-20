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

    public function addPost($post,$title)

    {
    	    $req = $this->db->prepare(' INSERT INTO posts(post,title,date_post) VALUES(?,?,NOW())');
    	    $addPost = $req->execute(array($Postid));
        return $addPost;
    }

    public function updatePost($title, $post, $Postid)

    {
    	    $req = $this->db->prepare(' UPDATE posts SET title = ?, post = ? WHERE id = ?');
    	    $updatePost = $req->execute(array($title, $post, $Postid));
        return $updatePost;
    }

    public function deletePost($Postid)

    {
    	    $req = $this->db->prepare(' DELETE FROM posts WHERE id = ?');
    	   $deletePost = $req->execute(array($Postid));
        return $deletePost;
    }
}

class CommentManager extends Manager
{
	public function getAllcomments()
	{
		$req = $this->db->query('SELECT id, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments ORDER BY date_comment DESC');
		return $req;
	}

	public function getReportcomments($Postid)
	{
		$req = $this->db->prepare('SELECT id, id_post, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments WHERE id_post = ? ORDER BY id DESC ');
		$req->execute(array($Postid));
		return $req;
	}

	public function deleteComment($Postid)

    {
    	    $req = $this->db->prepare(' DELETE FROM comments WHERE id = ?');
    	    $deleteComment = $req->execute(array($Postid));
        return $deleteComment;
    }
}


class AdminManager extends Manager
{

	public function connectAdmin($pseudo, $password)
	{

	$passwordh = password_hash($password, PASSWORD_DEFAULT);

	$req = $this->db->prepare('SELECT COUNT(pseudo) AS occurences FROM users WHERE pseudo = ? AND password = ?');
	$connectUser = $req->execute(array($pseudo, $passwordh));
	return $connectUser;

	}

}


