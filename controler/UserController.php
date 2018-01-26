<?php
namespace controler;
/**
 * connection class controller
 * manages data to send to the manager
 */
class UserController
{	

	/**
	* this method send an object with the new password 
	* 
	* 
	*/
	public function verifyAltid($db, \entity\User $user)
	{
		$altid = new \model\UserManager($db);
		$confirmaltid = $altid->compareAltid($user);

		if ($confirmaltid === FALSE)
        {
      
            
            throw new \Exception('Veuillez saisir un identifiant valide');
        }

        else 
        {
            
            $viewcontroller = new \controler\ViewController();
            $viewcontroller->newpassword();
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

		$mail = new \model\UserManager($db);
		$result = $mail->compareMail($user);

		if ($result == 1) 
		{
			$id = mt_rand();

			$altid = new \model\UserManager($db);
			$newaltid = $altid->updateAltid($id);

			$mail = 'jeremiehvt@gmail.com'; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = file_get_contents('vendor/mail/message_txt.txt');
			$message_html = file_get_contents('vendor/mail/message_html.php').$id;
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "réinitialisation de votre mot de passe";
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"jeremiehvt\"<jeremiehvt@gmail.com>".$passage_ligne;
			$header.= "Reply-to: \"jeremiehvt\" <jeremiehvt@gmail.com>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header .= "X-Priority: 1".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
			 
			//=====Envoi de l'e-mail.
			mail($mail,$sujet,$message,$header);
			//==========

			header('location: index.php');
		}

		else
		{
			throw new \Exception('votre email est invalide');
			
		}

	}
}