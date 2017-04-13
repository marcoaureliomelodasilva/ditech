<?php namespace model;

use lib\database\mysql\PDOMySQL;
use controller\Controller;

class Login
{
	private $db;
	private $ctrl;

	public function __construct()
	{	
		$this->db = new PDOMySQL();
		$this->ctrl = new Controller();
	}

	public function validateUser($user, $password)
	{ 
		$query = "
			SELECT 
				if (COUNT(use_no)=1, use_no, 0) AS id_user
			FROM 
				user 
			WHERE
				email = '{$user}'
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		$idUser = $query[0]->id_user;

		if ($idUser>0) {
			$hash = strtoupper(MD5($idUser.$password));
			$query = "
				SELECT 
					IF (COUNT(use_no)=1, true, false) AS validade
				FROM 
					user 
				WHERE
					use_no = {$idUser} AND
					hash = '{$hash}'
			";
			$query = $this->db->conn->prepare($query);
			$query->execute();
			$query = $query->fetchAll(FETCH_OBJ);
			$validade = $query[0]->validade;
		}
		if (isset($validade)) {
			$_SESSION["idUser"]=$idUser;
			$this->ctrl->headerLocation('/home');
		}else{
			$this->logout();
		}
	}

	public function logout()
	{
		if (isset($_SESSION["idUser"])) {
			session_unset($_SESSION["idUser"]); 
		}
		session_destroy(); 
		$this->ctrl->headerLocation('/login');
	}
}

?>