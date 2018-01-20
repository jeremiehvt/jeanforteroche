<?php



/**
 * DBFActory class
 * this class conteinn only one method to init mysql db with PDO 
 */
class DBFactory
{	
	public static function dbConnect()
    
	{
		$db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       
       return $db;
	}
}








