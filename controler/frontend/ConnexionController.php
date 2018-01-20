<?php

/**
 * connection class controller
 * manages data to send to the manager
 */
class Connexion 
{	
	/**
	* this method manage data of connectionform to send to the model 
	* 
	* 
	*/
	public function ConnectUser($db, User $user)
	{	
		$UserManager = FrontendUserManager();
		$ConnectUser = $UserManager->ConnectUser($db, $user);
	}

	/**
	* this method end admin connection
	* 
	* 
	*/
	public function Deconnexion()
	{
		$_SESSION = array();
		session_destroy();
		header('location: index.php');
	}
}