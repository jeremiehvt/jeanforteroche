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
    $ConnectUser = $req->fetch(\PDO::FETCH_ASSOC);
    
    
    if ($ConnectUser['existe'] == 1)
        {
            
            $_SESSION['user'] = $user->getPseudo();
            header('location: index.php?admin=home');
            exit();
        }

        elseif ($ConnectUser['existe'] == 0 )
        {
            
            header('location: index.php?action=connexion');
            
        }
        
    }
    // à voir et modifié
    public function updatePassword(\User $newpassword)
    {
        $req = $this->db->prepare('UPDATE users SET password = :password, pseudo =>:pseudo');
        $req->bindValue(':pseudo',$user->getPseudo());
        $req->bindValue(':password',$user->getPseudo());
        
    }

}