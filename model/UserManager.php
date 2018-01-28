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

    public function getInfos()
    {
        $req = $this->db->query('SELECT * FROM users');
        $req->setFetchMode(\PDO::FETCH_PROPS_LATE|\PDO::FETCH_CLASS,'\entity\User');
        $user = $req->fetchall();
        return $user;
    }

    public function setGenerals (\entity\User $user)
    {   
        $hash = hash('sha512', $user->getEmail());
        $req = $this->db->prepare('UPDATE users SET uniqueid = :uniqueid , pseudo = :pseudo , email = :email , bio = :bio WHERE id = :id');
        $req->bindvalue(':pseudo',$user->getPseudo());
        $req->bindvalue(':email',$user->getEmail());
        $req->bindvalue(':uniqueid',$hash);
        $req->bindvalue(':bio',$user->getBio());
        $req->bindvalue(':id',$user->getID());
        $req->execute();
        $generals = $req;
        return $generals;
    }

    public function setAllinfos(\entity\User $user)
    {   
        $hashmail = hash('sha512', $user->getEmail());
        $hashpass = hash('sha512', $user->getPassword());
        $req = $this->db->prepare('UPDATE users SET uniqueid = :uniqueid , pseudo = :pseudo , email = :email , password = :password , bio = :bio WHERE id = :id');
        $req->bindvalue(':pseudo',$user->getPseudo());
        $req->bindvalue(':email',$user->getEmail());
        $req->bindvalue(':uniqueid',$hashmail);
        $req->bindvalue(':password',$hashpass);
        $req->bindvalue(':bio',$user->getBio());
        $req->bindvalue(':id',$user->getID());
        $req->execute();
        $allinfos = $req;
        return $allinfos;
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
        $hash = hash('sha512',$user->getPassword());
        $req = $this->db->prepare('UPDATE users SET password = :password');
        $req->bindValue(':password',$hash);
        $req->execute();  
    }

    public function compareAltid(\entity\User $user)
    {
        
        $req = $this->db->prepare('SELECT COUNT(*) AS valide FROM users WHERE altid = :altid');
        $req->bindValue(':altid', $user->getAltid());
        $req->execute();
        $altid = $req->fetch(\PDO::FETCH_ASSOC);
        $result = $altid['valide'];
        return $result;
    }

    public function updateAltid($id)
    {
        $req = $this->db->prepare('UPDATE users SET altid = :altid');
        $req->bindValue(':altid',$id);
        $req->execute(); 
    }

}