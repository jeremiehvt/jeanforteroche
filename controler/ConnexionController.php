<?php
namespace controler;
/**
 * connection class controller
 * manages data to send to the manager
 */
class ConnexionController
{	
	/**
	* this method manage data of connectionform to send to the model 
	* 
	* 
	*/
	public function connectUser($db, \entity\User $user)
	{	
		$UserManager = new \model\UserManager($db);
		$ConnectUser = $UserManager->ConnectUser($user);

		if ($ConnectUser == 1)
        {
      
            
            $_SESSION['user'] = $user->getPseudo();
            header('location: index.php?admin=home');
            exit();
        }

        elseif ($ConnectUser == 0 )
        {
            
            throw new \Exception('votre mot de passe ou votre pseudo est incorrect');
            
        }
	}

	/**
	* this method end admin connection
	* 
	* 
	*/
	public function deconnexion()
	{
		$_SESSION = array();
		session_destroy();
		header('location: index.php');
	}
}