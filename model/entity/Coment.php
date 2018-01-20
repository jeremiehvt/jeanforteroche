<?php

/**
* Comment model
*/
class Coment  
{
	protected $id;
	protected $id_post;
	protected $comment;
	protected $date_comment;
	
	public function __construct($donnee = [])
	{
		$this->hydrate($donnee);
	}


	public function hydrate($donnee = [])
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

	public function getIdpost()
	{
		return $this->id_post;
	}

	public function getComment()
	{
		return $this->comment;
	}

	public function getDatecomment()
	{
		return $this->date_comment;
	}

	//setters

	public function setID($id)
	{
		$this->id = $id ;
	}

	public function setIdpost($idpost)
	{
		$this->id_post = $idpost;
	}

	public function setComment($comment)
	{
		$this->comment = $comment;
	}

	public function setDatecomment($datecomment)
	{
		$this->date_comment = $datecomment;
	}

}