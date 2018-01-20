<?php


/**
* class User
* this class verify the id's of user to connect him to admin
*  
*/
class FrontendUserManager 
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


   public function ConnectUser(User $user)
    {

    $req = $this->db->prepare('SELECT COUNT(*) AS existe FROM users WHERE pseudo = :pseudo AND password = :password ');
    $req->bindValue(':pseudo'=> $user->getPseudo());
    $req->bindValue(':password'=> $user->getPassword());
    $req->execute();
    $ConnectUser = $req->fetch(PDO::FETCH_ASSOC);
    
    
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
    public function updatePassword(User $newpassword)
    {
        $req = $this->db->prepare('UPDATE users SET password = :password, pseudo =>:pseudo')
        $req->bindValue(':pseudo'=>$newpassword->getPseudo());
        $req->bindValue(':password'=>$newpassword->getPseudo());
        
    }

}