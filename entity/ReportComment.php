<?php

namespace entity;
/**
* ReportComment model
*/
class ReportComment 
{
	protected $id;
	protected $id_comment;
	
	
	function __construct($donnee=[])
	{
		$this->hydrate($donnee);
	}


	public function hydrate($donnee=[])
	{
		foreach ($donnee as $key => $value) 
		{
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method)) 
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

	public function getIdcomment()
	{
		return $this->id_comment;
	}

	
	//setters
	public function setID($id)
	{
		$this->id = $id;
	}

	public function setIdcomment($idcomment)
	{
		$this->id_comment = $idcomment;
	}
}