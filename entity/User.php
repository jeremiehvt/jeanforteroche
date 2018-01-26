<?php

namespace entity;
/**
* Users model class
*/
class User 
{
	protected $id;
	protected $altid
	protected $pseudo;
	protected $email;
	protected $password;
	
	function __construct($donnee=[])
	{
		$this->hydrate($donnee);
	}


	public function hydrate($donnee=[])
	{
		foreach ($donnee as $key => $value) 
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)) 
			{
				$this->$method($value);
			}
		}
	}

	
	//getters
	
	public function getID()
	{
		return $this->id;
	}

	public function getAltid()
	{
		return $this->altid;
	}

	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	//setters

	public function setID($id)
	{
		$this->id = $id;
	}

	public function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
	
		$this->password = $password;
	}

	public function getAltid($altid)
	{
		$this->altid = $altid;
	}

}