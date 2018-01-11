<?php

namespace jeanforteroche\model\frontend;


/**
 * frontend abstract class Manager
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
 * this class manage all interaction with db to select posts
 */
class PostManager extends Manager
{
	/**
	* 
	* this method select the most recent post
	*/
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

    /**
	* 
	* this method select the most recent posts 
	*/
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

    /**
	* 
	* this method select all posts
	*/
    public function getPosts()
    {
        
        $req = $this->db->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts ORDER BY id DESC ');

        return $req;
    }

    /**
	* 
	* this method select one post 
	*/
    public function getPost($Postid)

    {
    	    $req = $this->db->prepare('  SELECT id, p.title select_title, p.post select_post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
    	    	FROM posts p
    	    	WHERE id = ? ');
    	    $req->execute(array($Postid));
        return $req;
    }
}

/**
 * class commentManager
 * this class manage all interaction with db to select or insert comments
 */
class CommentManager extends Manager
{	

	/**
	* 
	* this method select all comments
	*/
	public function getallComments()
	{
		$req = $this->db->query('SELECT id, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments ORDER BY date_comment DESC');
		return $req;
	}

	/**
	* 
	* this method select all comments from a post
	*/
	public function getComments($Postid)
	{
		$req = $this->db->prepare('SELECT id, id_post, comment,  DATE_FORMAT(date_comment, \'%d/%m/%y à %Hh%i\') AS date_comment  FROM comments WHERE id_post = ? ORDER BY id DESC LIMIT 0, 10');
		$req->execute(array($Postid));
		return $req;
	}

	/**
	* 
	* this method insert a new comment
	*/
	public function postComment($Postid, $comment)
	{
		$req = $this->db->prepare('INSERT INTO comments(id_post, comment, date_comment) VALUES (?,?,NOW())');
		$postcomment = $req->execute(array($Postid, $comment));
		return $postcomment;
	}

	/**
	* 
	* this method insert a new comment in reportcomment
	*/
	public function reportComment($Postid)
	{
		$req = $this->db->prepare('INSERT INTO reportcomments(id_comment) VALUES (?)');
		$reportcomment = $req->execute(array($Postid));
		return $reportcomment;
	}
}

/**
* class User
* this class verify the id's of user to connect him to admin
*  
*/
class User extends Manager
{
    
   public function ConnectUser($pseudo, $password)
    {

    $req = $this->db->prepare('SELECT COUNT(*) AS existe FROM users WHERE pseudo = ? AND password = ? ');
    $ConnectUser = $req->execute(array($pseudo, $password));
    $count = $req->fetch(\PDO::FETCH_ASSOC);
    
    if ($count['existe'] == 1)
        {
            
            $_SESSION['user'] = $_POST['pseudo'];
            header('location: index.php?admin=home');
            exit();
        }

        elseif ($count['existe'] == 0 )
        {
            
            header('location: index.php?action=connexion');
            
        }
        
    }
}


