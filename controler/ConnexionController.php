<?php

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
	public function ConnectUser($db, User $user)
	{	
		$UserManager = new UserManager($db);
		$ConnectUser = $UserManager->ConnectUser($user);
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