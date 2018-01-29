<?php
namespace vendor\mail;
/**
* 
*/
class SendMail
{
	protected $message_txt;
	protected $message_html;
	protected $mail;
	protected $altid;
	protected $subject;
	protected $pseudo;

	function __construct($data = [])
	{
		foreach ($data as $key => $value) 
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)) 
			{
				$this->$method($value);
			}
		}
	}

	public function setMail($mail)
	{
		$this->mail = $mail;
	}

	public function setMessageHtml($message_html)
	{
		$this->message_html = $message_html;
	}

	public function setMessageTxt($message_txt)
	{
		$this->message_txt = $message_txt;
	}

	public function setAltid($altid)
	{
		$this->altid = $altid;
	}

	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	public function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;
	}

	public function sendMail()
	{
			$mail = $this->mail; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = file_get_contents('vendor/mail/view/'.$this->message_txt.'.txt');
			$message_html = file_get_contents('vendor/mail/view/'.$this->message_html.'.php').$this->altid;
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = $this->subject;
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"".$this->pseudo."\"<".$mail.">".$passage_ligne;
			$header.= "Reply-to: \"".$this->pseudo."\" <".$mail.">".$passage_ligne;
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
			$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
			 
			//=====Envoi de l'e-mail.
			mail($mail,$sujet,$message,$header);
			//==========
	}
}