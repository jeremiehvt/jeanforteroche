<?php

namespace entity;
/**
* Post model
*/
class Post  
{
	protected $id;
	protected $post;
	protected $date_post;
	protected $title;
	
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

	public function getPost()
	{
		return $this->post;
	}

	public function getDatepost()
	{
		return $this->date_post;
	}

	public function getTitle()
	{
		return $this->title;
	}

	//setters
	public function setID($id)
	{
		$this->id = $id;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setPost ($post)
	{
		$this->post = $post;
	}

	public function setDatecommment($date)
	{
		$this->date_comment = $date;
	}
}