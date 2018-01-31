<?php
namespace controler;
/**
 * connection class controller
 * manages data to send to the manager
 */
class UserController
{

	/**
	* UserControlle
	* manages data to send an object to the manager
	*/
	public function updateGenerals($db, \entity\User $user)
	{
		$UserManager = new \model\UserManager($db);
		$updateGenerals = $UserManager->setGenerals($user);

		if ($updateGenerals === FALSE)
        {
            throw new \Exception('Veuillez vérifier vos informations');
        }

        else
        {
        	header('location: index.php?admin=updateprofil');
            exit();
        }
	}

	/**
	* UserController
	* manages data to send an object to the manager
	*/
	public function updateAllinfos($db, \entity\User $user)
	{
		$UserManager = new \model\UserManager($db);
		$updateAllinfos = $UserManager->setAllinfos($user);

		if ($updateAllinfos === FALSE)
        {
            throw new \Exception('Veuillez vérifier vos informations');
        }

        else
        {
        	header('location: index.php?admin=updateprofil');
            exit();
        }
	}

	/**
	* this method send an object with the new password 
	* 
	* 
	*/
	public function verifyAltid($db, \entity\User $user)
	{
		$altid = new \model\UserManager($db);
		$confirmaltid = $altid->compareAltid($user);

		if ($confirmaltid == 1)
        {
        	
			$viewcontroller = new \controler\ViewController();
			$viewcontroller->newpassword();

			$id = mt_rand();

			$altid = new \model\UserManager($db);
			$newaltid = $altid->updateAltid($id);
      		
        }

        else 
        {
            throw new \Exception('Veuillez saisir un identifiant valide');
            
        }
	}


	/**
	* this method send an object with the new password 
	* 
	* 
	*/
	public function updatePassword($db, \entity\User $user)
	{
		$password = new \model\UserManager($db);
		$newpassword = $password->updatePassword($user);

		$id = mt_rand();

		$altid = new \model\UserManager($db);
		$newaltid = $altid->updateAltid($id);

		if ($newpassword === FALSE)
        {
      
            
            throw new \Exception('Veuillez saisir un mot de passe valide');
        }

        else 
        {

            
            header('location: index.php?action=connexion');
            exit();
  	
        }
	}

	/**
	* this method send an object to verify mail
	* 
	* 
	*/
	public function verifyMail($db, \entity\User $user)
	{

		$VerifyMail = new \model\UserManager($db);
		$result = $VerifyMail->compareMail($user);

		if ($result == 1) 
		{
			require_once 'vendor/mail/Autoloader.php';
			\vendor\mail\Autoloader::register();

			$id = mt_rand();

			$altid = new \model\UserManager($db);
			$newaltid = $altid->updateAltid($id);

			$UserManager = new \model\UserManager($db);
			$user = $UserManager->getInfos();

			foreach ($user as $author) 
			{
				$mail = new \vendor\mail\SendMail(['messageTxt'=>'recovery_password','messageHtml'=>'recovery_password','mail'=>$author->getEmail(),'altid'=>$author->getAltid(),'subject'=>'nouveau mot de passe www.jeanforteroche.ovh', 'pseudo'=>$author->getpseudo()]);
				
			}

			$mail->sendMail();

			header('location: index.php');
			exit();

			
		}

		else
		{
			throw new \Exception('votre email est invalide');
			
		}

	}
}