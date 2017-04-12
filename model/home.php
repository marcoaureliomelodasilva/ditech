<?php namespace model;

use lib\database\mysql\PDOMySQL;

class Home
{

	private $ctrl;
	private $db;
	public $pagination;

	public function __construct(){	
		$this->db = new PDOMySQL();
	}

	public function listAll(){ 
		$query = "
			SELECT * FROM user
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}
}

?>