<?php
namespace model;
/**
 * class PostManager
 * this class manage all interaction with db for posts
 */
class PostManager 
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

         $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, '\entity\Post');
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
    	
        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, '\entity\Post');
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

        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, '\entity\Post');
        $posts = $req->fetchall();
        return $posts;
    }

    /**
	* 
	* this method select one post 
	*/
    public function getPost(\entity\post $post)

    {
	    $req = $this->db->prepare('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts WHERE id = :postid');
	    $req->bindValue(':postid', $post->getID(), \PDO::PARAM_INT);
        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, '\entity\Post');
        $req->execute();
        $post = $req->fetchall();
        return $post;
    }



    /**
    * 
    * this method insert post
    */
    public function addPost(\entity\Post $post)

    {
        $req = $this->db->prepare('INSERT INTO posts(post,title,date_post) VALUES(:post,:title,NOW())');
        $req->bindValue(':post',$post->getPost());
        $req->bindValue(':title',$post->getTitle());
        $req->execute();
        return $addPost = $req;   
    }

    /**
    * 
    * this method update post
    */
    public function updatePost(\entity\Post $post)

    {
        $req = $this->db->prepare(' UPDATE posts SET title = :title, post = :post WHERE id = :id');
        $req->bindValue(':post',$post->getPost());
        $req->bindValue(':title',$post->getTitle());
        $req->bindValue(':id',$post->getID());
        $req->execute();
        return $updatePost = $req;   
    }

    /**
    * 
    * this method delete a post
    */
    public function deletePost(\entity\Post $post)

    {
        $req = $this->db->prepare(' DELETE FROM posts WHERE id = :id');
        $req->bindValue(':id',$post->getID());
        $req->execute();
        return $deletePost = $req;
    }
}