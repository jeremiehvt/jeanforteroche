<?php


/**
 * class PostManager
 * this class manage all interaction with db to select, update, insert, or delete posts
 */
class BackendPostManager 
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
    * this method select allpost
    */
    public function getPost(Post $post)

    {
        $req = $this->db->prepare('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
            FROM posts 
            WHERE id = :postid');
        $req->bindValue(':postid', $post->getID());
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'post');
        $post = $req->fetchall();
        return $post;
    }

    /**
    * 
    * this method select onepost
    */
    public function getPosts()
    {
        
        $req = $this->db->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts ORDER BY id DESC ');

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'post');
        $posts = $req->fetchall();
        return $posts;
    }

    /**
    * 
    * this method insert post
    */
    public function addPost(Post $post)

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
    public function updatePost(Post $post)

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
    public function deletePost(Post $post)

    {
        $req = $this->db->prepare(' DELETE FROM posts WHERE id = :id');
        $req->bindValue(':id',$post->getID());
        $req->execute();
        return $deletePost = $req;
    }
}







