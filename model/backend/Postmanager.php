<?php

namespace jeanforteroche\model\backend;
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
    public function getPost($Postid)

    {
        $req = $this->db->prepare('SELECT id, p.title select_title, p.post select_post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post
            FROM posts p
            WHERE id = :id');
        $req->bindValue(':id'=> $Postid));
        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, 'post');
        $post = $req->fetch();
        return $post;
    }

    /**
    * 
    * this method select onepost
    */
    public function getPosts()
    {
        
        $req = $this->db->query('SELECT id, title, post, DATE_FORMAT(date_post, \'%d/%m/%y à %Hh%i\') AS date_post FROM posts ORDER BY id DESC ');

        $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, 'post');
        $posts = $req->fetchall();
        return $posts;
    }

    /**
    * 
    * this method insert post
    */
    public function addPost(post $newpost)

    {
        $req = $this->db->prepare('INSERT INTO posts(post,title,date_post) VALUES(:post,:title,NOW())');
        $req->bindValue(':post',$newpost->getPost());
        $req->bindValue(':title',$newpost->getTitle());

        $req->execute();   
    }

    /**
    * 
    * this method update post
    */
    public function updatePost(post $updatepost)

    {
	    $req = $this->db->prepare(' UPDATE posts SET title = :title, post = :post WHERE id = :id');
	    $req->bindValue(':post',$newpost->getPost());
        $req->bindValue(':title',$newpost->getTitle());
        $req->bindValue(':id',$newpost->getID());

        $req->execute();   
    }

    /**
    * 
    * this method delete a post
    */
    public function deletePost($Postid)

    {
        $req = $this->db->prepare(' DELETE FROM posts WHERE id = :id');
        $req->bindValue(':id'=>$Postid);
    }
}







