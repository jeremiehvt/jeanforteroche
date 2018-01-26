<?php
namespace model;

/**
* class User
* this class verify the id's of user 
*  
*/
class UserManager 
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


   public function ConnectUser(\entity\User $user)
    {
        $hash = hash('sha512',$user->getPassword());
        $req = $this->db->prepare('SELECT COUNT(*) AS existe FROM users WHERE pseudo = :pseudo AND password = :password ');
        $req->bindValue(':pseudo' , $user->getPseudo());
        $req->bindValue(':password', $hash);
        $req->execute();
        $password = $req->fetch(\PDO::FETCH_ASSOC);
        $ConnectUser = $password['existe'];
        return $ConnectUser;     
    }

    public function compareMail(\entity\User $user)
    {
        $hash = hash('sha512',$user->getEmail());
        $req = $this->db->prepare('SELECT COUNT(*) AS valide FROM users WHERE uniqueid = :mail');
        $req->bindValue(':mail', $hash);
        $req->execute();
        $mail = $req->fetch(\PDO::FETCH_ASSOC);
        $result = $mail['valide'];
        return $result;
    }

    // à voir et modifié
    public function updatePassword(\entity\User $user)
    {
        $req = $this->db->prepare('UPDATE users SET password = :password, pseudo =>:pseudo');
        $req->bindValue(':pseudo',$user->getPseudo());
        $req->bindValue(':password',$user->getPseudo()); 
        $req->execute();  
    }

    public function compareAltid(\entity\User $user)
    {
        
        $req = $this->db->prepare('SELECT COUNT(*) AS valide FROM users WHERE altid = :altid');
        $req->bindValue(':altid', $hash);
        $req->execute();
        $altid = $req->fetch(\PDO::FETCH_ASSOC);
        $result = $mail['valide'];
        return $result;
    }

    public function updateAltid($id)
    {
        $req = $this->db->prepare('UPDATE users SET altid = :altid');
        $req->bindValue(':pseudo',$id);
        $req->execute(); 
    }

}