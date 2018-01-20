<?php

/**
 * class PostManager
 * this class manage all interaction with db to select posts
 */
class FrontendPostManager 
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
	* this method select the most recent post
	*/
	public function getLastpost()
    {
        
        $req = $this->db->query
        (
			'SELECT id, post , title , DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
			FROM posts
			
			ORDER BY id DESC LIMIT 1 '
    	);

         $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Post');
         $laspost = $req->fetchall();
         return $laspost;

    }

    /**
	* 
	* this method select the most recent posts 
	*/
    public function getLastposts()
    {
      

        $req = $this->db->query
        (
			'SELECT id, post , title, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
			FROM posts 
			ORDER BY id DESC LIMIT 5'
    	);
    	
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Post');
        $lastposts = $req->fetchall();
       return $lastposts;
    }

    /**
	* 
	* this method select all posts
	*/
    public function getPosts()
    {
        
        $req = $this->db->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts ORDER BY id DESC ');

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Post');
        $posts = $req->fetchall();
        return $posts;
    }

    /**
	* 
	* this method select one post 
	*/
    public function getPost($Postid)

    {
	    $req = $this->db->prepare('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts WHERE id = :postid');
	    $req->bindValue(':postid', $Postid, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Post');
        $req->execute();
        $post = $req->fetchall();
        return $post;
    }
}